@extends('master_layout.employer_dashboard_master')
@section('applicant_tracking')


<main id="main" class="main">


    <section class="section dashboard">
        <div class="row">
            <div id="content" class="container-fluid mt-4">
                <div id="applicant-review-page" class="page-content">
                    <div id="saved-applicants-section" class="applicant-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Applicant Tracking</h3>
                        </div>

                        <ul class="nav nav-tabs" id="applicantTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="saved-candidates-tab" data-bs-toggle="tab"
                                    data-bs-target="#saved-candidates" type="button" role="tab"
                                    aria-controls="saved-candidates" aria-selected="true">Saved Candidates</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="first-interview-tab" data-bs-toggle="tab"
                                    data-bs-target="#first-interview" type="button" role="tab"
                                    aria-controls="first-interview" aria-selected="false">1st Interview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="second-interview-tab" data-bs-toggle="tab"
                                    data-bs-target="#second-interview" type="button" role="tab"
                                    aria-controls="second-interview" aria-selected="false">2nd Interview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="final-interview-tab" data-bs-toggle="tab"
                                    data-bs-target="#final-interview" type="button" role="tab"
                                    aria-controls="final-interview" aria-selected="false">Final Interview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="offer-tab" data-bs-toggle="tab" data-bs-target="#offer"
                                    type="button" role="tab" aria-controls="offer" aria-selected="false">Offer</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="applicantTabsContent">
                            <div class="tab-pane fade show active" id="saved-candidates" role="tabpanel"
                                aria-labelledby="saved-candidates-tab">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>Name</th>
                                            <th>Profile Picture</th>
                                            <th>Overall Skills</th>
                                            <th>Skill 1</th>
                                            <th>Skill 2</th>
                                            <th>Skill 3</th>
                                            <th>Overall Values</th>
                                        </tr>
                                    </thead>
                                    <tbody id="saved-candidates-list">
                                        <tr>
                                            <td><input type="checkbox" class="applicant-checkbox"></td>
                                            <td>Application Title 1</td>
                                            <td><img src="profile.jpg" alt="Profile Picture"
                                                    class="img-thumbnail profile-pic" style="width: 50px;">
                                                <input type="file" accept="image/*" style="display:none;"
                                                    class="profile-pic-input">
                                            </td>
                                            <td>80%</td>
                                            <td>90%</td>
                                            <td>96%</td>
                                            <td>77%</td>
                                            <td>75%</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="applicant-checkbox"></td>
                                            <td>Application Title 2</td>
                                            <td><img src="profile.jpg" alt="Profile Picture"
                                                    class="img-thumbnail profile-pic" style="width: 50px;">
                                                <input type="file" accept="image/*" style="display:none;"
                                                    class="profile-pic-input">
                                            </td>
                                            <td>90%</td>
                                            <td>67%</td>
                                            <td>88%</td>
                                            <td>89%</td>
                                            <td>74%</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="applicant-checkbox"></td>
                                            <td>Application Title 3</td>
                                            <td><img src="profile.jpg" alt="Profile Picture"
                                                    class="img-thumbnail profile-pic" style="width: 50px;">
                                                <input type="file" accept="image/*" style="display:none;"
                                                    class="profile-pic-input">
                                            </td>
                                            <td>80%</td>
                                            <td>90%</td>
                                            <td>96%</td>
                                            <td>77%</td>
                                            <td>75%</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="applicant-checkbox"></td>
                                            <td>Application Title 4</td>
                                            <td><img src="profile.jpg" alt="Profile Picture"
                                                    class="img-thumbnail profile-pic" style="width: 50px;">
                                                <input type="file" accept="image/*" style="display:none;"
                                                    class="profile-pic-input">
                                            </td>
                                            <td>90%</td>
                                            <td>67%</td>
                                            <td>88%</td>
                                            <td>89%</td>
                                            <td>74%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <a href="all-applicants.html" class="btn btn-link text-decoration-underline">View
                                        All</a>
                                </div>
                                <button class="btn btn-primary" onclick="openInterviewModal()">Arrange
                                    Interview</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="first-interview" role="tabpanel"
                            aria-labelledby="first-interview-tab">

                            <table class="table table-bordered">
                                <tbody id="first-interview-list">

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="second-interview" role="tabpanel"
                            aria-labelledby="second-interview-tab">

                            <table class="table table-bordered">
                                <tbody id="second-interview-list">

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="final-interview" role="tabpanel"
                            aria-labelledby="final-interview-tab">

                            <table class="table table-bordered">
                                <tbody id="final-interview-list">

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="offer" role="tabpanel" aria-labelledby="offer-tab">

                            <table class="table table-bordered">
                                <tbody id="offer-list">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="interviewModal" tabindex="-1" aria-labelledby="interviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="interviewModalLabel">Arrange Interview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="interviewForm">
                        <div class="mb-3">
                            <label for="interviewDate" class="form-label">Interview Date</label>
                            <input type="date" class="form-control" id="interviewDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="interviewTime" class="form-label">Interview Time</label>
                            <input type="time" class="form-control" id="interviewTime" required>
                        </div>
                        <div class="mb-3">
                            <label for="interviewStage" class="form-label">Interview Stage</label>
                            <select class="form-select" id="interviewStage" required>
                                <option value="first-interview">1st Interview</option>
                                <option value="second-interview">2nd Interview</option>
                                <option value="final-interview">Final Interview</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="scheduleInterview()">Schedule
                        Interview</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('select-all').addEventListener('change', function () {
            const isChecked = this.checked;
            const checkboxes = document.querySelectorAll('.applicant-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });


        function moveSelectedApplicants(stage) {
            const selectedApplicants = [];
            const checkboxes = document.querySelectorAll('.applicant-checkbox:checked');
            const stageListId = stage + '-list';
            const targetList = document.getElementById(stageListId);

            checkboxes.forEach(checkbox => {
                const row = checkbox.closest('tr');
                selectedApplicants.push(row.querySelector('td:nth-child(2)').innerText);
                targetList.appendChild(row);
            });

            if (selectedApplicants.length > 0) {
                alert('Moved the following applicants to ' + stage + ': ' + selectedApplicants.join(', '));

                const targetTab = document.getElementById(stage + '-tab');
                const tab = new bootstrap.Tab(targetTab);
                tab.show();
            } else {
                alert('Please select at least one applicant to move.');
            }
        }

        document.querySelectorAll('.profile-pic').forEach(profilePic => {
            profilePic.addEventListener('click', function () {
                const input = this.nextElementSibling;
                input.click();
            });
        });

        document.querySelectorAll('.profile-pic-input').forEach(input => {
            input.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = input.previousElementSibling;
                        img.src = e.target.result;
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        function openInterviewModal() {
            const selectedApplicants = document.querySelectorAll('.applicant-checkbox:checked');
            if (selectedApplicants.length === 0) {
                alert('Please select at least one applicant.');
                return;
            }

            const interviewModal = new bootstrap.Modal(document.getElementById('interviewModal'));
            interviewModal.show();
        }

        function scheduleInterview() {
            const interviewDate = document.getElementById('interviewDate').value;
            const interviewTime = document.getElementById('interviewTime').value;
            const interviewStage = document.getElementById('interviewStage').value;
            const selectedApplicants = document.querySelectorAll('.applicant-checkbox:checked');
            const targetList = document.getElementById(interviewStage + '-list');

            if (!interviewDate || !interviewTime || selectedApplicants.length === 0) {
                alert('Please fill all fields and select applicants.');
                return;
            }

            const scheduledApplicants = [];
            selectedApplicants.forEach(checkbox => {
                const row = checkbox.closest('tr');
                targetList.appendChild(row);
                scheduledApplicants.push(row.querySelector('td:nth-child(2)').innerText);
            });

            if (scheduledApplicants.length > 0) {
                alert('Scheduled interviews for the following applicants: ' + scheduledApplicants.join(', ') +
                    ' on ' + interviewDate + ' at ' + interviewTime);

                const interviewModal = bootstrap.Modal.getInstance(document.getElementById('interviewModal'));
                interviewModal.hide();
            }
        }

        document.getElementById('select-all').addEventListener('change', function () {
            const isChecked = this.checked;
            const checkboxes = document.querySelectorAll('.applicant-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });

    </script>

    @endsection