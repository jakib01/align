@extends('master_layout.employer_dashboard_master')
@section('employer_inbox')


<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Messages from Candidates</h5>
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
                                    <td>Jane Doe</td>
                                    <td>Follow-Up on Application</td>
                                    <td>Today, 10:00 AM</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#candidateMessage1">View</button>
                                    </td>
                                </tr>
                                <tr id="candidateMessage1" class="collapse">
                                    <td colspan="4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">Message</h6>
                                                <p>
                                                    Dear Employer,
                                                    <br />
                                                    I hope this message finds you well. I wanted to follow up on my application for the
                                                    <strong>Software Engineer</strong> position. I am very excited about the opportunity to join your team
                                                    and contribute to your company's success.
                                                    <br />
                                                    Looking forward to your response.
                                                    <br />
                                                    Best regards,<br />
                                                    Jane Doe
                                                </p>
                                                <hr />
                                                <h6 class="card-title">Compose</h6>
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="replyCandidate1" class="form-label">Your Message</label>
                                                        <textarea id="replyCandidate1" class="form-control" rows="3" placeholder="Type your reply here..."></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Send Reply</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>John Smith</td>
                                    <td>Application Inquiry</td>
                                    <td>Yesterday, 2:00 PM</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#candidateMessage2">View</button>
                                    </td>
                                </tr>
                                <tr id="candidateMessage2" class="collapse">
                                    <td colspan="4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">Message</h6>
                                                <p>
                                                    Dear Employer,
                                                    <br />
                                                    I am writing to inquire about the status of my application for the
                                                    <strong>Data Scientist</strong> position. Please let me know if there are any updates or additional information
                                                    I can provide to assist in your decision-making process.
                                                    <br />
                                                    Thank you for your time and consideration.
                                                    <br />
                                                    Best regards,<br />
                                                    John Smith
                                                </p>
                                                <hr />
                                                <h6 class="card-title">Compose</h6>
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="replyCandidate2" class="form-label">Your Message</label>
                                                        <textarea id="replyCandidate2" class="form-control" rows="3" placeholder="Type your reply here..."></textarea>
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