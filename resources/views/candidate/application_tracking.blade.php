@extends('master_layout.candidate_dashboard_master')
@section('application_tracking')


<style>
  .job-section {
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
    background-color: white;
    border: 1px solid #ddd;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
  }

  .category-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #6c757d;
  }

  .new-jobs .category-title {
    color: #007bff;
  }

  .shortlisted-jobs .category-title {
    color: #e83e8c;
  }

  .submitted-jobs .category-title {
    color: #fd7e14;
  }

  .job-card {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
    cursor: pointer;
  }

  .job-card h6 {
    font-size: 1rem;
    margin-bottom: 0.2rem;
  }

  .job-card p {
    margin-bottom: 0.4rem;
    color: #6c757d;
  }

  .job-card:last-child {
    border-bottom: none;
  }

  .badge {
    font-size: 0.9rem;
  }

  .search-bar {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
  }

  .job-section-container {
    border-radius: 5px;
    padding: 15px;
  }
</style>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Job Tracking</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Job Tracking</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="d-flex justify-content-between align-items-center my-4">
    <h2>Jobs</h2>
    <button class="btn btn-primary">Create Job</button>
  </div>

  <!-- Search Bar -->
  <div class="search-bar mb-4">
    <input type="text" id="search-input" class="form-control" placeholder="Search jobs..." />
    <button class="btn btn-secondary" onclick="filterJobs()">Search</button>
  </div>

  <div class="container">
    <div class="row">
      <!-- New Jobs -->
      <div class="col-lg-4">
        <div class="job-section bg-light">
          <div class="category-title">SUBMITTED ({{ count($jobs['newJobs']) }})</div>
          <div id="new-jobs-container"></div>
        </div>
      </div>

      <!-- Shortlisted Jobs -->
      <div class="col-lg-4">
        <div class="job-section bg-light">
          <div class="category-title">INTERVIEW PHASE ({{ count($jobs['shortlistedJobs']) }})</div>
          <div id="shortlisted-jobs-container"></div>
        </div>
      </div>

      <!-- Submitted Applications -->
      <div class="col-lg-4">
        <div class="job-section bg-light">
          <div class="category-title">OFFERED ({{ count($jobs['submittedJobs']) }})</div>
          <div id="submitted-jobs-container"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="jobModalLabel">Job Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p id="jobModalTitle"><strong>Title:</strong></p>
            <p id="jobModalCompany"><strong>Company:</strong></p>
            <p id="jobModalLocation"><strong>Location:</strong></p>
            <p id="jobModalType"><strong>Job Type:</strong></p>
            <p id="jobModalApplied">
                <strong>Applied:</strong> Yes, on [Date]
            </p>
            <p id="jobModalInterviewPhase" style="display:none;"><strong>Interview Phase:</strong> <span class="badge bg-primary"
                    id="interviewPhaseValue"></span></p>
            <p id="jobModalOfferMessage" style="display:none;"><strong>Offer Message:</strong> <span class="badge bg-success"
                    id="offerLetterMessageValue"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Apply Again</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const jobs = {
        jobCategories: @json($jobs)
    };

    // Function to display jobs
    function displayJobs() {
      const newJobsContainer = document.getElementById("new-jobs-container");
      const shortlistedJobsContainer = document.getElementById(
        "shortlisted-jobs-container"
      );
      const submittedJobsContainer = document.getElementById(
        "submitted-jobs-container"
      );

      newJobsContainer.innerHTML = createJobCards(jobs.jobCategories.newJobs);
      shortlistedJobsContainer.innerHTML = createJobCards(
        jobs.jobCategories.shortlistedJobs
      );
      submittedJobsContainer.innerHTML = createJobCards(
        jobs.jobCategories.submittedJobs
      );
    }

    function createJobCards(jobList) {
        return jobList
            .map(
                (job, index) => `
                    <div class="job-card" data-bs-toggle="modal" data-bs-target="#jobModal" onclick="showJobDetails(${index}, '${job.title}', '${job.company}', '${job.location}', '${job.jobType}', '${job.appliedDate}', '${job.interviewPhase || ''}', '${job.offerLetter || 0}', \`${job.offerLetterMessage || ''}\`)">
                      <h6>${job.title}</h6>
                      <p>${job.company} - ${job.location}</p>
                      <span class="badge bg-secondary">${job.jobType}</span>
                      ${
                    job.offerLetter == 1
                        ? `<span class="badge bg-success">Offered</span>`
                        : job.interviewPhase ? `<span class="badge bg-primary">${job.interviewPhase}</span>` : ''
                }
                    </div>
                `)
            .join("");
    }


    function showJobDetails(
        index,
        title,
        company,
        location,
        jobType,
        appliedDate,
        interviewPhase = "",
        offerLetter = 0,
        offerLetterMessage = ""
    ) {
      document.getElementById(
        "jobModalTitle"
      ).innerHTML = `<strong>Title:</strong> ${title}`;
      document.getElementById(
        "jobModalCompany"
      ).innerHTML = `<strong>Company:</strong> ${company}`;
      document.getElementById(
        "jobModalLocation"
      ).innerHTML = `<strong>Location:</strong> ${location}`;
      document.getElementById(
        "jobModalType"
      ).innerHTML = `<strong>Job Type:</strong> ${jobType}`;
      document.getElementById(
        "jobModalApplied"
      ).innerHTML = `<strong>Applied:</strong> Yes, on ${appliedDate}`;
        // Interview Phase
        const interviewPhaseEl = document.getElementById("jobModalInterviewPhase");
        const interviewPhaseValueEl = document.getElementById("interviewPhaseValue");
        if (interviewPhase && offerLetter != 1) {
            interviewPhaseValueEl.textContent = interviewPhase;
            interviewPhaseEl.style.display = "block";
        } else {
            interviewPhaseEl.style.display = "none";
        }

        // Offer Letter Message
        const offerMessageEl = document.getElementById("jobModalOfferMessage");
        const offerMessageValueEl = document.getElementById("offerLetterMessageValue");
        if (offerLetter == 1 && offerLetterMessage) {
            offerMessageValueEl.textContent = offerLetterMessage;
            offerMessageEl.style.display = "block";
        } else {
            offerMessageEl.style.display = "none";
        }
    }

    function filterJobs() {
      const searchInput = document
        .getElementById("search-input")
        .value.toLowerCase();
      const filteredNewJobs = jobs.jobCategories.newJobs.filter((job) =>
        job.title.toLowerCase().includes(searchInput)
      );
      const filteredShortlistedJobs =
        jobs.jobCategories.shortlistedJobs.filter((job) =>
          job.title.toLowerCase().includes(searchInput)
        );
      const filteredSubmittedJobs = jobs.jobCategories.submittedJobs.filter(
        (job) => job.title.toLowerCase().includes(searchInput)
      );

      document.getElementById("new-jobs-container").innerHTML =
        createJobCards(filteredNewJobs);
      document.getElementById("shortlisted-jobs-container").innerHTML =
        createJobCards(filteredShortlistedJobs);
      document.getElementById("submitted-jobs-container").innerHTML =
        createJobCards(filteredSubmittedJobs);
    }

    window.onload = displayJobs;
  </script>

  @endsection
