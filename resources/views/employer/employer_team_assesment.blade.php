@extends('master_layout.employer_dashboard_master')
@section('employer_team_assesment')

    <style>
        @media (max-width: 768px) {
            .accordion-item {
                margin-bottom: 0px;
                border: 1px solid #dee2e6;
                border-radius: 0.5rem;
                width: calc(100% - 0rem);
                margin-left: auto;
                margin-right: auto;
            }

            .accordion-body {
                padding: 1rem;
            }
        }
    </style>
    <main id="main" class="main">
        <div class="container-fluid">
            <section class="section mb-5 mt-5">
                <h2 class="fs-5 mb-3">Candidates Assessment Details</h2>
                <div class="table-responsive d-none d-md-block">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Candidate Name</th>
                            <th>Email</th>
                            <th>Behavioral Assessment</th>
                            <th>Value Assessment</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($candidates as $index => $candidate)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $candidate->candidate_name }}</td>
                                    <td>{{ $candidate->email }}</td>
                                    <td>
                                        @if(isset($candidate->behaviour_assesment_score) && isset($candidate->behaviour_assesment_completed_at))
                                            ✅ Completed
                                        @else
                                            ❌ Not Completed
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($candidate->value_assessment_score) && isset($candidate->value_assessment_completed_at))
                                            ✅ Completed
                                        @else
                                            ❌ Not Completed
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-3">
                    {{ $candidates->links() }}
                </div>
            </section>
        </div>
    </main>

@endsection
