@extends('master_layout.candidate_dashboard_master')
@section('inbox')


<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Messages</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">From</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Received</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Job Interview</td>
                                    <td>Today, 2:00 PM</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#message1">View</button>
                                    </td>
                                </tr>
                                <tr id="message1" class="collapse">
                                    <td colspan="4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">Message</h6>
                                                <p>
                                                    Dear Candidate,
                                                    <br />
                                                    We are pleased to invite you for an interview for the position of
                                                    <strong>Software Engineer</strong>. Please find the details below:
                                                    <br />
                                                    Date: January 5th, 2025<br />
                                                    Time: 10:00 AM<br />
                                                    Venue: ABC Corp, New York, NY<br />
                                                    <br />
                                                    Best regards,<br />
                                                    John Doe
                                                </p>
                                                <hr />
                                                <h6 class="card-title">Compose</h6>
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="replyMessageJohn" class="form-label">Your Message</label>
                                                        <textarea id="replyMessageJohn" class="form-control" rows="3" placeholder="Type your reply here..."></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Send Reply</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                               <tr>
                                    <td>Jane Smith</td>
                                    <td>Job Application Update</td>
                                    <td>Yesterday, 10:00 AM</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#message2">View</button>
                                    </td>
                                </tr>
                                <tr id="message2" class="collapse">
                                    <td colspan="4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">Message</h6>
                                                <p>
                                                    Dear Candidate,
                                                    <br />
                                                    We have reviewed your application for the position of
                                                    <strong>Project Manager</strong>. Unfortunately, we have decided
                                                    to move forward with other candidates at this time.
                                                    <br />
                                                    Thank you for your interest in our company. We wish you all the best in your job search.
                                                    <br />
                                                    Best regards,<br />
                                                    Jane Smith
                                                </p>
                                                <hr />
                                                <h6 class="card-title">Compose</h6>
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="replyMessageJane" class="form-label">Your Message</label>
                                                        <textarea id="replyMessageJane" class="form-control" rows="3" placeholder="Type your reply here..."></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Send Reply</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection