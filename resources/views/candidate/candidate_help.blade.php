@extends('master_layout.candidate_master')
@section('candidate_help')

<style>
    body {
        background: #97fff6;
        min-height: 100vh;
        /* Ensures the gradient covers the entire viewport height */
    }
</style>


<header class="hero-section d-flex align-items-center justify-content-center text-center" style="height: 60vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="hero-content">
                    <h1 class="display-3 fw-bold text-dark">Help</h1>
                    <p class="lead text-dark">
                        This help section addresses common questions and concerns, helping you understand the
                        value of using the Align platform.
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>

<main class="container my-5">
    <div class="row g-1">
        <div class="col-md-6">
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-center mb-4">Frequently Asked Questions</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                How does Align work for job seekers?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Align helps you apply for jobs by showcasing your skills rather than just your
                                experience. You earn skill badges through assessments, which are then added to your Job
                                Passport.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What is a JobPass™?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                A JobPass™ is your digital profile on Align, displaying your earned skill badges. It
                                replaces the traditional CV and allows employers to see your true abilities.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Do I need to pay to use Aligned?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No, Align is free for candidates to use. You can earn skill badges, create a Job
                                Passport, and apply for jobs without any costs.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                How do I earn skill badges?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You earn skill badges by passing assessments on the Align platform. These badges verify
                                your abilities in specific areas and are required to apply for certain jobs.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can I apply for any job on Align?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can only apply for jobs that match the skill badges you have earned. This ensures
                                that you are a strong candidate for the roles you apply for, increasing your chances of
                                success.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                How does Align help with career switching?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Align focuses on skills, not experience. If you have the relevant skills for a new
                                industry, you can showcase them through your JobPass™ and apply for jobs outside of
                                your current field.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Will I receive feedback on my applications?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Align ensures that you receive better visibility by limiting the number of applicants
                                per job. While direct feedback isn’t guaranteed, your chances of getting an interview
                                are significantly higher.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                What happens if my skill badge expires?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Skill badges have expiration dates to ensure your abilities are up to date. You can
                                retake the relevant assessment to renew the badge and keep your JobPass™ current.
                            </div>
                        </div>
                    </div>



                    <!-- Continue adding more FAQs as needed -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-white rounded shadow p-4">
                <h2 class="text-center mb-4">Contact Us</h2>
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Your Name" required />
                        <label for="name">Your Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" required />
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="subject" placeholder="Subject" required />
                        <label for="subject">Subject</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" placeholder="Your Message"
                            style="resize: none; height: 150px" required></textarea>
                        <label for="message">Your Message</label>
                    </div>
                    <button type="submit" class="btn text-dark w-100" style="background: #97fff6;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection()