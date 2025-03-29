
<div class="modal fade" id="offerletterModal" tabindex="-1" aria-labelledby="offerletterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="offerLetterForm" method="POST" action="{{ route('offer.letter', ['id' => ':id']) }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="offerletterModalLabel">Send Offer Letter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="applicantId" name="applicant_id">
                    <div class="mb-3">
                        <label for="offerLetterContent" class="form-label">Offer Letter Content</label>
                        <textarea class="form-control" id="offerLetterContent" name="offer_letter_content" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Offer Letter</button>
                </div>
            </form>
        </div>
    </div>
</div>
