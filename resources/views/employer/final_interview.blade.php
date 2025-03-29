@extends('master_layout.employer_dashboard_master')
@section('final_interview')

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
                                
                            </li>
                            
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
                                            <!-- <th>Interview stage</th> -->
                                            <th>status</th>
                                            <!-- <th>date</th> -->
                                            <th>view</th>
                                            <th>action</th>
                                            <th>reply status</th>
                                        </tr>
                                      </thead>
                  <tbody id="saved-candidates-list">
                    @foreach($applicant as $key=>$row)
                      <tr>
                            <td>{{++$key}}</td>
                          <!-- <td><input type="checkbox" class="applicant-checkbox"></td> -->
                          <td>{{$row->candidate_name}}</td>
                          
                          <td>{{$row->job_title}}</td>
                          
                          <!-- <td><div class="mb-3">
                            
                            <select class="form-select" id="interviewStage" required>
                                
                                
                                <option value="final-interview">Final </option>
                            </select>
                        </div></td> -->
                        <td data-interview-date="{{ $row->third_interview_date ?? '' }}">
                            <span class="remaining-time">
                            {{ $row->third_interview_date ? 'Calculating...' : 'No interview date set' }}
                            </span>
                        </td>
                          
                          <!-- <td style="width: 20px;"><input type="datetime-local" class="form-control" id="interviewDate" required></td> -->
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
                          {{-- <td>
                            
                            <a  href="" class="btn btn-dark">send offer letter</a>
                          </td> --}}

                          <td>
                            {{-- <a  href="" class="btn btn-primary">edit  1st</a> --}}
                            <button  
                            @php
                            if($row->offerletter==1)
                            {
                            @endphp
                            disabled
                            @php
                            }
                            @endphp

                           
                            data-applicant-id="{{ $row->id }}" class="btn btn-dark offer-letter"
        
                           >Offer Letter</button>
                          </td>

                          {{-- <td>
                            <a href="#" class="btn btn-dark offer-letter" data-applicant-id="{{ $row->id }}">Offer Letter</a>

                        </td> --}}

                        <td>
                            {{-- <a  href="" class="btn btn-primary">edit  1st</a> --}}
                             
                            @php
                            if($row->accept_offerletter==1)
                            {
                            @endphp
                            <button class="btn btn-success">accepted</button>
                            @php
                            }
                            @endphp

                            @php
                            if($row->accept_offerletter==null)
                            {
                            @endphp
                            <button class="btn btn-primary">pending</button>
                            @php
                            }
                            @endphp
                            
                            
                           
                            
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

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  @include('employer.applicant_modal')
  @include('employer.offer_letter_modal')

  <script>
    document.addEventListener('DOMContentLoaded', function () {
     const rows = document.querySelectorAll('[data-interview-date]');
 
     rows.forEach(row => {
         const interviewDateAttr = row.getAttribute('data-interview-date');
         const remainingTimeElement = row.querySelector('.remaining-time');
 
         // Ensure the element exists for this row
         if (!remainingTimeElement) return;
 
         // Check if the interview date is missing
         if (!interviewDateAttr) {
             remainingTimeElement.textContent = "No interview date set";
             return;
         }
 
         const interviewDate = new Date(interviewDateAttr);
 
         function updateRemainingTime() {
             const now = new Date();
             const diff = interviewDate - now;
 
             if (diff <= 0) {
                 remainingTimeElement.textContent = "Time expired.";
                 // clearInterval(interval); // Stop the interval for this row
                 return;
             }
 
             const days = Math.floor(diff / (1000 * 60 * 60 * 24));
             const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
             const minutes = Math.floor((diff / (1000 * 60)) % 60);
             const seconds = Math.floor((diff / 1000) % 60);
 
             remainingTimeElement.textContent = 
                 `${days}d ${hours}h ${minutes}m ${seconds}s remaining for 2nd interview`;
         }
 
         // Update the time immediately and every second
         updateRemainingTime();
         const interval = setInterval(updateRemainingTime, 1000);
     });
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


<script>

    // $(document).on('click', '.offer-letter', function (e) {
    //     e.preventDefault();
    
    //     // Show the modal
    //     $('#offerletterModal').modal('show');
    // });
    

    

      </script>

      <script>

$(document).on('click', '.offer-letter', function (e) {
    e.preventDefault();

    // Get the applicant ID from the button
    let applicantId = $(this).data('applicant-id');

    // Set the hidden input value in the modal
    $('#applicantId').val(applicantId);

    // Update the form action with the correct ID
    const formAction = "{{ route('offer.letter', ':id') }}".replace(':id', applicantId);
    $('#offerLetterForm').attr('action', formAction);

    // Show the modal
    $('#offerletterModal').modal('show');
});


      </script>