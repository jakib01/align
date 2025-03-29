@extends('master_layout.admin_master')

@section('assessment_behaviour')

<main id="main" class="main py-5 bg-light">
    <div class="container-fluid">
        <h1 class="text-center mb-4 text-primary">Behaviour Assessment</h1>
        <div class="row justify-content-center">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('assessment.store', ['type' => 'behaviour']) }}">
                @csrf
                <div id="questions-container">
                    <!-- Initially one question block with empty fields -->
                    <div class="question-block mb-5 card shadow-sm p-4 rounded" id="question-block-1">
                        <div class="form-group">
                            <label for="question-1" class="font-weight-bold text-dark">Question 1:</label>
                            <input type="text" id="question-1" name="questions[1][question]"
                                class="form-control form-control-lg" placeholder="Enter your question here" required>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <!-- Empty answer options for the first question -->
                            <div class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <input type="text" id="answer-1-1" name="questions[1][answers][1][option_text]"
                                        class="form-control form-control-lg text-center" placeholder="Enter option"
                                        autocomplete="off">

                                    <input type="number" id="score-1-1" name="questions[1][answers][1][score]"
                                        class="form-control form-control-lg mt-2 text-center" placeholder="Score"
                                        required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <input type="text" id="answer-1-2" name="questions[1][answers][2][option_text]"
                                        class="form-control form-control-lg text-center" placeholder="Enter option"
                                        autocomplete="off">

                                    <input type="number" id="score-1-2" name="questions[1][answers][2][score]"
                                        class="form-control form-control-lg mt-2 text-center" placeholder="Score"
                                        required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <input type="text" id="answer-1-3" name="questions[1][answers][3][option_text]"
                                        class="form-control form-control-lg text-center" placeholder="Enter option"
                                        autocomplete="off">

                                    <input type="number" id="score-1-3" name="questions[1][answers][3][score]"
                                        class="form-control form-control-lg mt-2 text-center" placeholder="Score"
                                        required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <input type="text" id="answer-1-4" name="questions[1][answers][4][option_text]"
                                        class="form-control form-control-lg text-center" placeholder="Enter option"
                                        autocomplete="off">

                                    <input type="number" id="score-1-4" name="questions[1][answers][4][score]"
                                        class="form-control form-control-lg mt-2 text-center" placeholder="Score"
                                        required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <input type="text" id="answer-1-5" name="questions[1][answers][5][option_text]"
                                        class="form-control form-control-lg text-center" placeholder="Enter option"
                                        autocomplete="off">

                                    <input type="number" id="score-1-5" name="questions[1][answers][5][score]"
                                        class="form-control form-control-lg mt-2 text-center" placeholder="Score"
                                        required autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button to add another question -->
                <button type="button" class="btn btn-outline-primary btn-block mb-4" id="add-question-btn"
                    style="border-radius: 8px;">Add Another Question</button>

                <!-- Button to preview the assessment -->
                <button type="button" class="btn btn-info btn-block mb-4" id="preview-btn"
                    style="border-radius: 8px;">Preview Assessment</button>

                <!-- Submit Button in a centered container -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg" style="width: 50%;">
                        Submit Assessment
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Preview Modal -->
<div class="modal fade opacity-100" id="assessmentPreviewModal" tabindex="-1"
    aria-labelledby="assessmentPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assessmentPreviewModalLabel">Assessment Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="preview-container">
                    <!-- The questions will be dynamically added here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Proceed with Submission</button>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        let questionIndex = 2; // Start from 2 for additional questions
        const questionsContainer = document.getElementById('questions-container');
        const addQuestionBtn = document.getElementById('add-question-btn');
        const previewBtn = document.getElementById('preview-btn');
        const previewContainer = document.getElementById('preview-container');
        const form = document.querySelector('form');

        // Add Question button functionality
        addQuestionBtn.addEventListener('click', function () {
            // Create a new question block
            const questionBlock = document.createElement('div');
            questionBlock.classList.add('question-block', 'mb-5', 'card', 'shadow-sm', 'p-4', 'rounded');
            questionBlock.id = `question-block-${questionIndex}`;

            // Create the question input field
            const questionGroup = document.createElement('div');
            questionGroup.classList.add('form-group');

            const questionLabel = document.createElement('label');
            questionLabel.setAttribute('for', `question-${questionIndex}`);
            questionLabel.classList.add('font-weight-bold', 'text-dark');
            questionLabel.textContent = `Question ${questionIndex}:`;

            const questionInput = document.createElement('input');
            questionInput.setAttribute('type', 'text');
            questionInput.setAttribute('id', `question-${questionIndex}`);
            questionInput.setAttribute('name', `questions[${questionIndex}][question]`);
            questionInput.classList.add('form-control', 'form-control-lg');
            questionInput.setAttribute('placeholder', 'Enter your question here');
            questionInput.required = true;

            questionGroup.appendChild(questionLabel);
            questionGroup.appendChild(questionInput);
            questionBlock.appendChild(questionGroup);

            // Create options with scores
            const optionsRow = document.createElement('div');
            optionsRow.classList.add('form-group', 'row', 'd-flex', 'justify-content-center');

            for (let i = 1; i <= 5; i++) {
                const optionCol = document.createElement('div');
                optionCol.classList.add('col-12', 'col-sm-6', 'col-md-2', 'mb-3', 'd-flex', 'justify-content-center', 'align-items-center');

                const answerOption = document.createElement('div');
                answerOption.classList.add('d-flex', 'flex-column', 'justify-content-center', 'align-items-center');

                const answerInput = document.createElement('input');
                answerInput.setAttribute('type', 'text');
                answerInput.setAttribute('id', `answer-${questionIndex}-${i}`);
                answerInput.setAttribute('name', `questions[${questionIndex}][answers][${i}][option_text]`);
                answerInput.classList.add('form-control', 'form-control-lg', 'text-center');
                answerInput.setAttribute('placeholder', `Option ${i}`);
                answerInput.required = true;

                const scoreInput = document.createElement('input');
                scoreInput.setAttribute('type', 'number');
                scoreInput.setAttribute('id', `score-${questionIndex}-${i}`);
                scoreInput.setAttribute('name', `questions[${questionIndex}][answers][${i}][score]`);
                scoreInput.classList.add('form-control', 'form-control-lg', 'mt-2', 'text-center');
                scoreInput.setAttribute('placeholder', 'Score');
                scoreInput.required = true;

                answerOption.appendChild(answerInput);
                answerOption.appendChild(scoreInput);

                optionCol.appendChild(answerOption);
                optionsRow.appendChild(optionCol);
            }

            questionBlock.appendChild(optionsRow);

            // Append the new question block to the questions container
            questionsContainer.appendChild(questionBlock);

            // Increment question index for the next question
            questionIndex++;
        });

        // Preview button click handler
        previewBtn.addEventListener('click', function () {
            previewContainer.innerHTML = ''; // Clear existing preview content
            const questions = document.querySelectorAll('.question-block'); // Select all question blocks

            questions.forEach(function (questionBlock) {
                // Extract the question text
                const questionInput = questionBlock.querySelector('input[type="text"]:not([name*="answers"])');
                const questionText = questionInput ? questionInput.value.trim() : '';

                if (!questionText) return; // Skip if question is empty

                // Extract answer fields and their corresponding score fields
                const answerTextFields = questionBlock.querySelectorAll('input[name*="[answers]"][type="text"]');
                const scoreFields = questionBlock.querySelectorAll('input[name*="[answers]"][type="number"]');

                let previewHTML = `<h5>${questionText}</h5><ul>`; // Start building the preview HTML

                answerTextFields.forEach((answerField, index) => {
                    const answerText = answerField.value.trim(); // Get the option text
                    const score = scoreFields[index] ? scoreFields[index].value.trim() : 'N/A'; // Get the score or default to N/A

                    if (answerText) {
                        previewHTML += `<li><strong>${answerText}:</strong> ${score || 'N/A'}</li>`;
                    }
                });

                previewHTML += '</ul>'; // Close the list

                // Create a container for the question and its options
                const questionPreview = document.createElement('div');
                questionPreview.innerHTML = previewHTML;
                previewContainer.appendChild(questionPreview); // Add to the modal's preview container
            });

            // Open the preview modal
            const previewModal = new bootstrap.Modal(document.getElementById('assessmentPreviewModal'));
            previewModal.show();
        });

        // Frontend validation to ensure no empty fields
        form.addEventListener('submit', function (e) {
            let isValid = true;

            // Check if all required fields are filled
            const inputs = form.querySelectorAll('input[required]');
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid'); // Highlight invalid fields
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid'); // Remove highlighting for valid fields
                }
            });

            if (!isValid) {
                e.preventDefault(); // Prevent form submission
                alert('Please fill in all required fields.');
            }
        });
    });
</script>


@endsection