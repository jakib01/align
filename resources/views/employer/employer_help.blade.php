@extends('master_layout.employer_master')
@section('employer_help')

<style>
    body {
        background: black;
        min-height: 100vh;
        /* Ensures the gradient covers the entire viewport height */
    }
</style>




<header class="hero-section d-flex align-items-center justify-content-center text-center" style="height: 60vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="hero-content">
                    <h1 class="display-3 fw-bold text-white">Help</h1>
                    <p class="lead text-white">
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
                                How does Align improve the quality of applicants?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Align requires candidates to hold specific skill badges to apply for roles. This ensures
                                that only those with relevant skills can apply, reducing the number of low-quality
                                applications.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Can Align help us diversify our workforce?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, Aligned focuses on skills rather than experience. This allows you to discover
                                talented candidates from diverse backgrounds and industries, helping you meet your DEI
                                targets.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How does Align reduce bias in recruitment?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Aligned uses objective data about candidates' skills, values, and behaviours to make
                                hiring decisions. This approach minimises unconscious bias that can arise from
                                traditional CV and interview-based methods.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What is a JobPass™, and how does it work?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                A JobPass™ is a digital profile that candidates use instead of a CV. It showcases
                                their relevant skills through badges earned by passing assessments. This allows you to
                                see their true capabilities, not just their past experiences.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can we use our own assessments on Align?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                All assessments on Align are standardised to ensure consistency and fairness across all
                                candidates. This approach allows you to reliably compare applicants' skills as every
                                candidate is evaluated on the same criteria.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                How does Align help us save time in the recruitment process?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                By filtering out unqualified applicants early on and presenting candidates with verified
                                skills, Align reduces the time you spend on screening and shortlisting.

                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                How do I get started with Align?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can sign up on the Align platform, create job listings, and specify the required
                                skill badges. Our team can assist you in setting up your account and helping you with
                                your recruitment needs.
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
                    <button type="submit" class="btn w-100" style="background: #97FFF6;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection()