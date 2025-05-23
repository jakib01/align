@extends('master_layout.employer_dashboard_master')
@section('saved_applicant')

<main id="main" class="main">
   

    <div class="pagetitle">
        <h1>All saved Applicant & Call For Interview</h1>
        <nav>
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item active">Applicant Tracking</li>
            </ol> -->
        </nav>
        <label class="py-2" for="">Search</label><br>
        <input type="text" placeholder="search job title/applicant name">
    </div>

    <section class="section dashboard">
        <div class="row">
            <div id="content" class="container-fluid mt-4">
                <div id="applicant-review-page" class="page-content">
                    <div id="saved-applicants-section" class="applicant-section">
                        <!-- <div class="d-flex justify-content-between align-items-center">
                            <h3>Applicant Tracking</h3>
                        </div> -->

                        <ul class="nav nav-tabs" id="applicantTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <!-- <button class="nav-link active" id="saved-candidates-tab" data-bs-toggle="tab" data-bs-target="#saved-candidates" type="button" role="tab" aria-controls="saved-candidates" aria-selected="true">Saved Candidates</button> -->
                            </li>
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="first-interview-tab" data-bs-toggle="tab" data-bs-target="#first-interview" type="button" role="tab" aria-controls="first-interview" aria-selected="false">1st Interview</button>
                            </li> -->
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="second-interview-tab" data-bs-toggle="tab" data-bs-target="#second-interview" type="button" role="tab" aria-controls="second-interview" aria-selected="false">2nd Interview</button>
                            </li> -->
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="final-interview-tab" data-bs-toggle="tab" data-bs-target="#final-interview" type="button" role="tab" aria-controls="final-interview" aria-selected="false">Final Interview</button>
                            </li> -->
                            <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="offer-tab" data-bs-toggle="tab" data-bs-target="#offer" type="button" role="tab" aria-controls="offer" aria-selected="false">Offer</button>
                            </li> -->
                        </ul>

                        <div class="tab-content" id="applicantTabsContent">
                            <div class="tab-pane fade show active" id="saved-candidates" role="tabpanel" aria-labelledby="saved-candidates-tab">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th><input type="checkbox" id="select-all"></th> -->
                                            <th>SL No.</th>
                                            <th>Name</th>
                                            
                                            <th>Applied job title</th>
                                            <th>Interview stage</th>
                                            
                                            <th>date</th>
                                            <th>view</th>
                                            <th>action</th>
                                        </tr>
                                      </thead>
                  <tbody id="saved-candidates-list">
                    @foreach($applicant as $key=>$row)
                      <tr>
                        <td>{{$key+1}}</td>
                          <td>{{$row->candidate_name}}</td>
                          
                          <td>{{$row->job_title}}</td>
                          <td>
                            <div class="mb-3">                        
                            <select  id="interviewStage-{{ $row->job_post_id }}" required>
                                <option value="" disabled selected>--Select an option--</option>
                                <option value="1">Interview Stage 1</option>
                                <option value="2">Interview Stage 2</option>
                                <option value="3">Interview Stage 3</option>
                            </select>
                           </div>
                         </td>
                          
                          <td>
                            <input type="datetime-local" id="datetime-{{ $row->job_post_id }}" class="datetime-input form-control"
                            
                            required></td>

                          {{-- <td>

                           

                            <a href="#"  class="btn btn-warning view-applicant"
                            data-candidate-name="{{ $row->candidate_name }}"
                            data-job-title="{{ $row->job_title }}"
                            data-interview-stage="{{ $row->first_interview ?? $row->second_interview ?? $row->third_interview ?? 'Not Assigned' }}"
                            data-interview-date="{{ $row->first_interview_date ?? $row->second_interview_date ?? $row->third_interview_date ?? 'Not Assigned' }}"
                            
                            >view applicant</a>
                          </td> --}}
                          <td>
                            <a href="#"  class="btn btn-warning view-applicant"
                            data-candidate-name="{{ $row->candidate_name }}"
                            data-job-title="{{ $row->job_title }}"
                            
                            {{-- data-interview-stage="{{ $row->third_interview ?? 'Not Assigned' }}" --}}
                            data-interview-date1="{{ $row->first_interview_date ?? 'Not Assigned' }}"
                            data-interview-date2="{{ $row->second_interview_date ?? 'Not Assigned' }}"
                            data-interview-date="{{ $row->third_interview_date ?? 'Not Assigned' }}"
                            
                            >view applicant</a>
                        </td>
                          <td>
                            <button  
                            @php
                            if($row->first_interview||$row->second_interview||$row->third_interview)
                            {
                            @endphp
                            disabled
                            @php
                            }
                            @endphp

                           
                            data-id="{{$row->job_post_id}}" class="update-button btn btn-primary"
        
                           >call</button>
                          </td>
                      </tr>
                     @endforeach 
                  </tbody>
              </table>
              <!-- <div class="mt-3">
                  <a href="all-applicants.html" class="btn btn-link text-decoration-underline">View All</a>
              </div> -->
              <!-- <button class="btn btn-primary" onclick="openInterviewModal()">Arrange Interview</button> -->
            </div>
          </div>
          <div class="tab-pane fade" id="first-interview" role="tabpanel" aria-labelledby="first-interview-tab">
             
              <table class="table table-bordered">
                  <tbody id="first-interview-list">
                      
                  </tbody>
              </table>
          </div>
          <div class="tab-pane fade" id="second-interview" role="tabpanel" aria-labelledby="second-interview-tab">
              
              <table class="table table-bordered">
                  <tbody id="second-interview-list">
                      
                  </tbody>
              </table>
          </div>
          <div class="tab-pane fade" id="final-interview" role="tabpanel" aria-labelledby="final-interview-tab">
              
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

  @endsection

  @include('employer.applicant_modal')
  
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <script>

$(document).on('click', '.update-button', function () {
    let id = $(this).data('id'); // Get the record ID
    let datetimeValue = $(`#datetime-${id}`).val();
    let interviewStage = $(`#interviewStage-${id}`).val();
    
    

    if (datetimeValue) {
        // console.log(`ID: ${recordId}, Date-Time: ${datetimeValue}`);
        console.log(id);
    console.log(datetimeValue);
    console.log(interviewStage);
        
        // Example AJAX call to send the datetime value to Laravel
        $.ajax({
            url: '{{ route("first.interview.date") }}', // Laravel route
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // CSRF token
                id: id,                // Record ID
                datetime: datetimeValue,      // Selected Date-Time
                interviewStage: interviewStage
            },
            success: function (response) {
                alert(response.success);
                location.reload(); // Show success message
            },
            error: function (xhr) {
                alert('Error: ' + xhr.responseJSON.message); // Show error message
            }
        });
    } else {
        alert('Please select a valid date and time.');
    }
});



  </script>

<script>

    $(document).on('click', '.view-applicant', function (e) {
        e.preventDefault();
    
        // Get data from the button
        let candidateName = $(this).data('candidate-name');
        let jobTitle = $(this).data('job-title');
        let interviewDate1 = $(this).data('interview-date1');
        let interviewDate2 = $(this).data('interview-date2');
        let interviewStage = $(this).data('interview-stage');
        let interviewDate = $(this).data('interview-date');
    
        // Populate the modal with the data
        $('#modalCandidateName').text(candidateName);
        $('#modalJobTitle').text(jobTitle);
        // $('#modalInterviewStage').text(interviewStage);
        $('#modalInterviewDate').text(interviewDate);
        $('#modalInterviewDate1').text(interviewDate1);
        $('#modalInterviewDate2').text(interviewDate2);
    
        // Show the modal
        $('#applicantModal').modal('show');
    });
    
      </script>

