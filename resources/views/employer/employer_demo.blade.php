@extends('master_layout.employer_master')
@section('employer_demo')


<section id="request-demo" style="background: black; padding-top: 90px; padding-bottom: 50px;">
    <div class="container">
        <div class="row g-0">
            <!-- Left side -->
            <div class="col-md-6  text-black d-flex align-items-center p-5 rounded-start" style="background:#7c8bff">
                <div>
                    <h1 class="display-6 fw-bold text-white">Request a demo</h1>
                    <p class=" text-white">
                        Want to see how you can revolutionise your recruitment process with Align? Request a demo to see
                        how our
                        data-driven platform connects you with top talent faster, improves diversity, and ensures
                        smarter, objective
                        hiring decisions.
                    </p>
                </div>
            </div>
            <!-- Right side -->
            <div class="col-md-6 bg-white p-5 rounded-end">
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" required />
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email" required />
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Company" />
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Job Title" />
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Message" rows="3" style="resize: none;"></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="terms-checkbox-demo" required />
                        <label class="form-check-label" for="terms-checkbox-demo">
                            I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a> & <a href="#"
                                class="text-decoration-none">Privacy Policy</a>
                        </label>
                    </div>
                    <button type="submit" class="btn text-black w-100" style="background: #97FFF6;">Request a
                        Demo</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection