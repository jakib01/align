@extends('master_layout.employer_dashboard_master')

@section('employer_team')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="container-fluid">
                            <div id="team-member-content" class="form-section">
                                <h3 class="text-center">Team Details</h3>
                                <div class="d-flex justify-content-center align-items-center mb-4">
                                    <input type="text" class="form-control w-50" placeholder="Search Team Members..."
                                           aria-label="Search Team Members">
                                    <button class="btn btn-outline-secondary ms-3" data-bs-toggle="modal" data-bs-target="#addTeamMemberModal">
                                        <i class="fas fa-plus ms-2"></i>
                                        <i class="fas fa-users"></i> Team Members
                                    </button>

                                    <!-- Modal -->
                                    @if(isset($teamMember))
                                    <div class="modal fade" id="addTeamMemberModal" tabindex="-1" aria-labelledby="addTeamMemberModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ isset($teamMember) ? route('team.update', $teamMember->id) : route('team.store') }}">
                                                    @csrf
                                                    @if(isset($teamMember))
                                                        @method('PUT')
                                                    @endif

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addTeamMemberModalLabel">
                                                            {{ isset($teamMember) ? 'Edit Team Member' : 'Add New Team Member' }}
                                                        </h5>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $teamMember->name ?? '' }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Role</label>
                                                            <input type="text" class="form-control" name="role" value="{{ $teamMember->role ?? '' }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email" value="{{ $teamMember->email ?? '' }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Admin Status</label>
                                                            <select class="form-control" name="admin_status" required>
                                                                <option value="admin" {{ (isset($teamMember) && $teamMember->admin_status == 'admin') ? 'selected' : '' }}>Admin</option>
                                                                <option value="collaborator" {{ (isset($teamMember) && $teamMember->admin_status == 'collaborator') ? 'selected' : '' }}>Collaborator</option>
                                                                <option value="team-member" {{ (isset($teamMember) && $teamMember->admin_status == 'team-member') ? 'selected' : '' }}>Team Member</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <a href="{{ route('employer.dashboard') }}" class="btn btn-secondary">Cancel</a>
                                                        <button type="submit" class="btn btn-primary">{{ isset($teamMember) ? 'Update' : 'Add' }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                                <div class="table-responsive d-none d-md-block">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>Member Name</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="team-members-table">
                                            @forelse($teamMembers as $member)
                                                <tr data-member-id="1">
                                                    <td><input type="checkbox" class="member-checkbox"></td>
                                                    <td>{{ $member->name }}</td>
                                                    <td>{{ $member->role }}</td>
                                                    <td>{{ $member->email }}</td>
                                                    <td>
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('team.edit', $member->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <!-- Delete Form -->
                                                        <form action="{{ route('team.destroy', $member->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="section mb-5">
                    <h2 class="fs-5 mb-3 fw-bold" style="font-size:2.5rem;">Values</h2>
                    <div class="chart-container">
                        <canvas id="valuesRadarChart" style="max-height: 400px; width: 100%"></canvas>
                    </div>
                    <h2 class="fs-5 mb-3 mt-5 fw-bold" style="font-size: 2.5rem;">Behaviour</h2>
                    <div class="chart-container">
                        <canvas id="behaviourRadarChart" style="max-height: 400px; width: 100%"></canvas>
                    </div>
                </section>
            </div>
        </section>
    </main>
    @if(isset($teamMember))
        <style>
            .modal-backdrop {
                display: none;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('addTeamMemberModal'));
                myModal.show();
            });
        </script>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const valuesAssessmentData = [
            [65, 59, 90, 81, 56, 55, 40, 78, 83, 67],
            [70, 65, 85, 80, 60, 58, 45, 75, 85, 68],
            [60, 58, 88, 79, 54, 53, 42, 76, 82, 65]
        ];

        const behaviourAssessmentData = [
            [28, 48, 40, 19, 96, 27, 100, 90, 87, 66],
            [30, 50, 38, 18, 95, 30, 98, 88, 85, 65],
            [25, 45, 42, 20, 94, 29, 99, 89, 86, 67]
        ];

        function calculateAverage(data) {
            let numMembers = data.length;
            let numCriteria = data[0].length;
            let averages = new Array(numCriteria).fill(0);

            data.forEach(memberData => {
                memberData.forEach((value, index) => {
                    averages[index] += value;
                });
            });

            averages = averages.map(sum => sum / numMembers);
            return averages;
        }

        const avgValuesAssessment = calculateAverage(valuesAssessmentData);
        const avgBehaviourAssessment = calculateAverage(behaviourAssessmentData);

        new Chart(document.querySelector('#valuesRadarChart'), {
            type: 'radar',
            data: {
                labels: ['Achievement', 'Security', 'Universalism', 'Benevolence', 'Conformity', 'Tradition', 'Hedonism', 'Power', 'Self-direction', 'Stimulation'],
                datasets: [
                    {
                        label: 'Values Assessment',
                        data: avgValuesAssessment,
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)'
                    }
                ]
            },
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                }
            }
        });
        new Chart(document.querySelector('#behaviourRadarChart'), {
            type: 'radar',
            data: {
                labels: ['Emotional Stability', 'Flexibility', 'Emotional Sensitivity', 'Routine-Orientation', 'Assertiveness', 'Discipline', 'Cooperativeness', 'Socialibility', 'Flexibility', 'Reflectiveness', 'Exploration'],
                datasets: [
                    {
                        label: 'Behaviour Assessment',
                        data: avgBehaviourAssessment,
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgb(54, 162, 235)',
                        pointBackgroundColor: 'rgb(54, 162, 235)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(54, 162, 235)'
                    }
                ]
            },
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                }
            }
        });
    });
</script>
@endsection
