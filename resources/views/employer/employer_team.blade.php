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
                            <input type="text" class="form-control w-50" placeholder="Search Team Members..." aria-label="Search Team Members">
                            <button class="btn btn-outline-secondary ms-3">
                                <i class="fas fa-plus ms-2"></i>
                                <i class="fas fa-users"></i> Team Members
                            </button>
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
                                    <tr data-member-id="1">
                                        <td><input type="checkbox" class="member-checkbox"></td>
                                        <td>Member 1</td>
                                        <td>Head of Insight Team</td>
                                        <td>member1@gmail.com</td>
                                        <td>
                                        <button class="btn btn-warning btn-sm edit-member-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete-member-btn">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-member-id="2">
                                        <td><input type="checkbox" class="member-checkbox"></td>
                                        <td>Member 2</td>
                                        <td>Insight Manager</td>
                                        <td>member2@gmail.com</td>
                                        <td>
                                        <button class="btn btn-warning btn-sm edit-member-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete-member-btn">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr data-member-id="3">
                                        <td><input type="checkbox" class="member-checkbox"></td>
                                        <td>Member 3</td>
                                        <td>Insight Executive</td>
                                        <td>member3@gmail.com</td>
                                        <td>
                                                <button class="btn btn-warning btn-sm edit-member-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm delete-member-btn">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                   
                        <div class="accordion d-md-none" id="teamMembersAccordion">
                            @foreach([
                                ['id' => '1', 'name' => 'Member 1', 'role' => 'Head of Insight Team', 'email' => 'member1@gmail.com'],
                                ['id' => '2', 'name' => 'Member 2', 'role' => 'Insight Manager', 'email' => 'member2@gmail.com'],
                                ['id' => '3', 'name' => 'Member 3', 'role' => 'Insight Executive', 'email' => 'member3@gmail.com'],
                            ] as $index => $member)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                        {{ $member['name'] }} - {{ $member['role'] }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#teamMembersAccordion">
                                    <div class="accordion-body">
                                        <p><strong>Email:</strong> {{ $member['email'] }}</p>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-danger btn-sm delete-member-btn">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <button class="btn btn-warning btn-sm edit-member-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <a href="view-all-team-members.html" class="btn btn-link">View All</a>
                        </div>
                            </div>
                    <div id="bulk-add-member-form" class="form-section d-none">
                        <h4>Add Members (Up to 10)</h4>
                        <form id="bulk-add-form">
                            <table class="table table-bordered" id="member-input-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Admin Status</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="member-name" required></td>
                                        <td><input type="text" class="form-control" name="member-role" required></td>
                                        <td>
                                            <select class="form-control" name="member-admin" required>
                                                <option value="admin">Admin</option>
                                                <option value="collaborator">Collaborator</option>
                                                <option value="team-member">Team Member</option>
                                            </select>
                                        </td>
                                        <td><input type="email" class="form-control" name="member-email" required></td>
                                        <td><button type="button" class="btn btn-danger remove-member-row">Remove</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-secondary" id="add-row-btn">Add Another Member</button>
                            <button type="submit" class="btn btn-primary">Add Members</button>
                            <button type="button" id="cancel-bulk-add-btn" class="btn btn-secondary">Cancel</button>
                        </form>
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
                    labels: ['Emotional Stability', 'Flexibility', 'Emotional Sensitivity', 'Routine-Orientation', 'Assertiveness', 'Discipline', 'Cooperativeness', 'Socialibility', 'Flexibility', 'Reflectiveness','Exploration'],
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