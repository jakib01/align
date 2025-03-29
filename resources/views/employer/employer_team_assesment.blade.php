
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
        <section class="section mb-5">
            <div class="accordion d-md-none" id="teamMembersAccordion">
                @foreach([
                    ['name' => 'Member1', 'role' => 'Head of Insight', 'status' => 'Admin', 'email' => 'member1@gmail.com', 'values' => '&#10003;', 'behaviours' => '&#10003;'],
                    ['name' => 'Member2', 'role' => 'Insight Manager', 'status' => 'Collaborator', 'email' => 'member2@gmail.com', 'values' => 'Invite Sent', 'behaviours' => 'Invite Sent'],
                    ['name' => 'Member3', 'role' => 'Insight Executive', 'status' => 'Team Member', 'email' => 'member3@gmail.com', 'values' => '&#10003;', 'behaviours' => 'Reminder Sent'],
                ] as $index => $member)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="teamHeading{{ $index }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#teamCollapse{{ $index }}" aria-expanded="false" aria-controls="teamCollapse{{ $index }}">
                            {{ $member['name'] }} - {{ $member['role'] }}
                        </button>
                    </h2>
                    <div id="teamCollapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="teamHeading{{ $index }}" data-bs-parent="#teamMembersAccordion">
                        <div class="accordion-body">
                            <p><strong>Email Address:</strong> {{ $member['email'] }}</p>
                            <p><strong>Admin Status:</strong> {{ $member['status'] }}</p>
                            <p><strong>Values Assessment:</strong> {!! $member['values'] !!}</p>
                            <p><strong>Behaviours Assessment:</strong> {!! $member['behaviours'] !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <section class="section mb-5">
            <h2 class="fs-5 mb-3">Values Assessment Details</h2>
           <div class="table-responsive d-none d-md-block">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Member</th>
                            <th>Role</th>
                            <th>Test Status
                                <select id="status-filter" class="form-select form-select-sm d-inline-block w-auto ms-2">
                                    <option value="">All</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Not Completed">Not Completed</option>
                                    <option value="Invite Sent">Invite Sent</option>
                                    <option value="Reminder Sent">Reminder Sent</option>
                                </select>
                            </th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Member1</td>
                            <td>Head of Insight</td>
                            <td>Completed</td>
                            <td>01.01.24</td>
                        </tr>
                        <tr>
                            <td>Member2</td>
                            <td>Insight Manager</td>
                            <td>Invite Sent</td>
                            <td>10.01.24</td>
                        </tr>
                        <tr>
                            <td>Member3</td>
                            <td>Insight Executive</td>
                            <td>Reminder Sent</td>
                            <td>20.01.24</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="accordion d-md-none" id="valuesAssessmentAccordion">
                @foreach([
                    ['name' => 'Member1', 'role' => 'Head of Insight', 'status' => 'Completed', 'date' => '01.01.24'],
                    ['name' => 'Member2', 'role' => 'Insight Manager', 'status' => 'Invite Sent', 'date' => '10.01.24'],
                    ['name' => 'Member3', 'role' => 'Insight Executive', 'status' => 'Reminder Sent', 'date' => '20.01.24'],
                ] as $index => $assessment)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="valuesHeading{{ $index }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#valuesCollapse{{ $index }}" aria-expanded="false" aria-controls="valuesCollapse{{ $index }}">
                            {{ $assessment['name'] }} - {{ $assessment['role'] }}
                        </button>
                    </h2>
                    <div id="valuesCollapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="valuesHeading{{ $index }}" data-bs-parent="#valuesAssessmentAccordion">
                        <div class="accordion-body">
                            <p><strong>Test Status:</strong> {{ $assessment['status'] }}</p>
                            <p><strong>Date:</strong> {{ $assessment['date'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <section class="section mb-5">
            <h2 class="fs-5 mb-3">Behaviour Assessment Details</h2>
            <div class="table-responsive d-none d-md-block">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Member</th>
                            <th>Role</th>
                            <th>Test Status
                                <select id="behaviour-status-filter" class="form-select form-select-sm d-inline-block w-auto ms-2">
                                    <option value="">All</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Not Completed">Not Completed</option>
                                    <option value="Invite Sent">Invite Sent</option>
                                    <option value="Reminder Sent">Reminder Sent</option>
                                </select>
                            </th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Member1</td>
                            <td>Behaviour Head</td>
                            <td>Completed</td>
                            <td>01.02.24</td>
                        </tr>
                        <tr>
                            <td>Member2</td>
                            <td>Behaviour Analyst</td>
                            <td>Not Completed</td>
                            <td>15.02.24</td>
                        </tr>
                        <tr>
                            <td>Member3</td>
                            <td>Behaviour Specialist</td>
                            <td>Reminder Sent</td>
                            <td>20.02.24</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="accordion d-md-none" id="behaviourAssessmentAccordion">
                @foreach([
                    ['name' => 'Member1', 'role' => 'Behaviour Head', 'status' => 'Completed', 'date' => '01.02.24'],
                    ['name' => 'Member2', 'role' => 'Behaviour Analyst', 'status' => 'Not Completed', 'date' => '15.02.24'],
                    ['name' => 'Member3', 'role' => 'Behaviour Specialist', 'status' => 'Reminder Sent', 'date' => '20.02.24'],
                ] as $index => $assessment)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="behaviourHeading{{ $index }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#behaviourCollapse{{ $index }}" aria-expanded="false" aria-controls="behaviourCollapse{{ $index }}">
                            {{ $assessment['name'] }} - {{ $assessment['role'] }}
                        </button>
                    </h2>
                    <div id="behaviourCollapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="behaviourHeading{{ $index }}" data-bs-parent="#behaviourAssessmentAccordion">
                        <div class="accordion-body">
                            <p><strong>Test Status:</strong> {{ $assessment['status'] }}</p>
                            <p><strong>Date:</strong> {{ $assessment['date'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</main>

   
  @endsection