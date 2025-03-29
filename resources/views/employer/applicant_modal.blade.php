


<div class="modal fade" id="applicantModal" tabindex="-1" role="dialog" aria-labelledby="applicantModalLabel" aria-hidden="true">
    <form action="" method="post" id="addProductForm">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Applicant Details</h5>
                {{-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> --}}
              </div>
              <div class="modal-body">

                <p><strong>Candidate Name:</strong> <span id="modalCandidateName"></span></p>
                <p><strong>Job Title:</strong> <span id="modalJobTitle"></span></p>
                <p><strong>Interview Stage:</strong> <span>1</span></p>
                <p><strong>Interview Date:</strong> <span id="modalInterviewDate1"></span></p>
                <p><strong>Interview Stage:</strong> <span>2</span></p>
                <p><strong>Interview Date:</strong> <span id="modalInterviewDate2"></span></p>
                {{-- <p><strong>Interview Stage:</strong> <span id="modalInterviewStage"></span></p> --}}
                <p><strong>Interview Stage:</strong> <span>3</span></p>
                <p><strong>Interview Date:</strong> <span id="modalInterviewDate"></span></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary add_product">Save Product</button> --}}
              </div>
            </div>
          </div>

    </form>
  </div>