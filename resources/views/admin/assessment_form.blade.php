@extends('master_layout.admin_master')

@section('assessment_form')

<style>
    .question-block:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    button {
        border-radius: 50px;
        padding: 12px 30px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    label {
        font-size: 1.1rem;
        font-weight: 600;
    }


    .modal-content {
        border-radius: 15px;
        padding: 20px;
    }

    .modal-header {
        border-bottom: none;
    }

    .question-block {
        opacity: 0;
        animation: fadeIn 0.5s forwards;
    }

    @keyframes fadeIn {
        100% {
            opacity: 1;
        }
    }
</style>

<main id="main" class="main py-5 bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- Form Container -->
            <div id="assessment-form" class="w-100 mt-4">
                <div class="text-center mb-5">
                    <h2 class="display-4 font-weight-bold text-gradient-primary" id="assessment-title">
                        <span class="text-primary">{{ ucfirst($assessmentType) }}</span>
                        <span class="text-secondary">Assessment</span>
                    </h2>
                    <p class="text-muted font-italic mt-2">
                        Prepare for success by crafting a thorough assessment for your candidates.
                    </p>
                </div>


                <form method="POST" action="{{ route('assessment.store', ['type' => $assessmentType]) }}">
                    @csrf
                    <div id="questions-container">
                        <!-- Initially one question block with empty fields -->
                        <div class="question-block mb-5 card shadow-sm p-4 rounded" id="question-block-1">
                            <div class="form-group">
                                <label for="question-1" class="font-weight-bold text-dark"
                                    style="width: 150px;">Question 1:</label>
                                <div class="input-group">
                                    <input type="text" id="question-1" name="questions[1][question]"
                                        class="form-control form-control-lg" placeholder="Enter your question here"
                                        required>

                                </div>
                            </div>

                            <div class="form-group row d-flex justify-content-center">
                                <!-- Empty answer options for the first question -->
                                <div
                                    class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <input type="text" id="answer-1-1" name="questions[1][answers][1][option_text]"
                                            class="form-control form-control-lg text-center" placeholder="Enter option"
                                            autocomplete="off">
                                        <div class="input-group mt-2">
                                            <input type="number" id="score-1-1" name="questions[1][answers][1][score]"
                                                class="form-control form-control-lg text-center" placeholder="Score"
                                                required autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <input type="text" id="answer-1-2" name="questions[1][answers][2][option_text]"
                                            class="form-control form-control-lg text-center" placeholder="Enter option"
                                            autocomplete="off">
                                        <div class="input-group mt-2">
                                            <input type="number" id="score-1-2" name="questions[1][answers][2][score]"
                                                class="form-control form-control-lg text-center" placeholder="Score"
                                                required autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <input type="text" id="answer-1-3" name="questions[1][answers][3][option_text]"
                                            class="form-control form-control-lg text-center" placeholder="Enter option"
                                            autocomplete="off">
                                        <div class="input-group mt-2">
                                            <input type="number" id="score-1-3" name="questions[1][answers][3][score]"
                                                class="form-control form-control-lg text-center" placeholder="Score"
                                                required autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <input type="text" id="answer-1-4" name="questions[1][answers][4][option_text]"
                                            class="form-control form-control-lg text-center" placeholder="Enter option"
                                            autocomplete="off">
                                        <div class="input-group mt-2">
                                            <input type="number" id="score-1-4" name="questions[1][answers][4][score]"
                                                class="form-control form-control-lg text-center" placeholder="Score"
                                                required autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-6 col-md-2 mb-3 d-flex justify-content-center align-items-center">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <input type="text" id="answer-1-5" name="questions[1][answers][5][option_text]"
                                            class="form-control form-control-lg text-center" placeholder="Enter option"
                                            autocomplete="off">
                                        <div class="input-group mt-2">
                                            <input type="number" id="score-1-5" name="questions[1][answers][5][score]"
                                                class="form-control form-control-lg text-center" placeholder="Score"
                                                required autocomplete="off">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Buttons to preview and submit assessment -->
                    <div class="d-flex justify-content-center mt-4 gap-3">
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success btn-lg mb-4"
                            style="width: 250px; border-radius: 3rem;">
                            <i class="fas fa-check-circle"></i> Submit Assessment
                        </button>
                        <!-- Button to preview the assessment -->
                        <button type="button" class="btn btn-info btn-lg mb-4" id="preview-btn"
                            style="border-radius: 3rem; width: 250px;">
                            <i class="fas fa-eye"></i> Preview Assessment
                        </button>
                        <!-- Button to add another question -->
                        <button type="button" class="btn btn-outline-primary btn-lg mb-4" id="add-question-btn"
                            style="border-radius: 3rem; width: 250px;">
                            <i class="fas fa-plus-circle"></i> Add Another Question
                        </button>
                    </div>
                </form>
            </div>
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
        const assessmentTitle = document.getElementById('assessment-title');
        const assessmentForm = document.getElementById('assessment-form');

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

            // If there are previous options, use them for the new question
            const prevQuestionBlock = document.getElementById(`question-block-${questionIndex - 1}`);
            const prevAnswers = prevQuestionBlock ? prevQuestionBlock.querySelectorAll('input[name*="[answers]"][type="text"]') : [];

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

                // If previous answers exist, copy them
                if (prevAnswers[i - 1]) {
                    answerInput.value = prevAnswers[i - 1].value;
                }

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

            // Create "Remove" button
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.classList.add('btn', 'btn-danger', 'btn-lg', 'mt-3');
            removeBtn.style.borderRadius = '3rem'; // Rounded corners
            removeBtn.style.width = '250px'; // Same width as the other buttons
            removeBtn.textContent = 'Remove Question';

            // Add event listener for the button
            removeBtn.addEventListener('click', function () {
                questionBlock.remove(); // Remove the question block from the container
            });

            // Create a container to center the button
            const buttonContainer = document.createElement('div');
            buttonContainer.classList.add('d-flex', 'justify-content-center', 'mt-3');
            buttonContainer.appendChild(removeBtn);

            // Append the button container to the question block
            questionBlock.appendChild(buttonContainer);

            // Append the new question block to the questions container
            questionsContainer.appendChild(questionBlock);
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
    });

</script>

@endsection