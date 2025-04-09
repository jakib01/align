@extends('master_layout.candidate_dashboard_master')
@section('candidate_profile')

<main id="main" class="main">
  <section class="section profile">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body d-flex">
              <div class="w-50 d-flex flex-column align-items-center border-end pe-4">
                <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle mb-3" style="width: 120px; height: 120px; padding-top: 20px;">
                <h2 class="mt-3">Kevin Anderson</h2>
                <div class="social-links mt-2 d-flex justify-content-center">
                  <a href="#" class="twitter mx-2"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook mx-2"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram mx-2"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin mx-2"><i class="bi bi-linkedin"></i></a>
                </div>
                <div class="mt-4">
                  <a href="#" class="btn btn-primary" download="Kevin-Anderson-Profile.pdf">
                    <i class="bi bi-download me-2"></i>Download JobPass
                  </a>
                </div>
              </div> 
              <div class="w-50 ps-4">
              <h3 class="text-center pt-4">Job Preferences</h3>
<ul class="list-group list-group-flush">

  <li class="list-group-item d-flex justify-content-between align-items-center">
    <div>
      <strong>Location:</strong>
      <span class="me-2">London</span>
      <a data-bs-toggle="collapse" href="#editLocation" aria-expanded="false" aria-controls="editLocation">
        <i class="bi bi-pencil text-primary"></i>
      </a>
    </div>
    <div class="collapse mt-2" id="editLocation">
      <select class="form-select form-select-sm">
        <option value="London">London</option>
        <option value="Liverpool">Liverpool</option>
        <option value="Manchester">Manchester</option>
        <option value="Birmingham">Birmingham</option>
        <option value="Edinburgh">Edinburgh</option>
        <option value="Glasgow">Glasgow</option>
     </select>
    </div>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <div>
      <strong>Seniority:</strong>
      <span class="me-2">Senior</span>
      <a data-bs-toggle="collapse" href="#editSeniority" aria-expanded="false" aria-controls="editSeniority">
        <i class="bi bi-pencil text-primary"></i>
      </a>
    </div>
    <div class="collapse mt-2" id="editSeniority">
      <select class="form-select form-select-sm">
        <option value="Junior">Junior</option>
        <option value="Mid-level">Mid-level</option>
        <option value="Senior">Senior</option>
      </select>
    </div>
  </li>  
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <div>
      <strong>Salary:</strong>
      <span class="me-2">£50,000 - £60,000</span>
      <a data-bs-toggle="collapse" href="#editSalary" aria-expanded="false" aria-controls="editSalary">
        <i class="bi bi-pencil text-primary"></i>
      </a>
    </div>
    <div class="collapse mt-2" id="editSalary">
      <select class="form-select form-select-sm">
        <option value="30000-40000">£30,000 - £40,000</option>
        <option value="40000-50000">£40,000 - £50,000</option>
        <option value="50000-60000" selected>£50,000 - £60,000</option>
        <option value="60000-70000">£60,000 - £70,000</option>
      </select>
    </div>
  </li>  
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <div>
      <strong>Contract:</strong>
      <span class="me-2">Full-time</span>
      <a data-bs-toggle="collapse" href="#editContract" aria-expanded="false" aria-controls="editContract">
        <i class="bi bi-pencil text-primary"></i>
      </a>
    </div>
    <div class="collapse mt-2" id="editContract">
      <select class="form-select form-select-sm">
        <option value="Full-time">Full-time</option>
        <option value="Part-time">Part-time</option>
        <option value="Contract">Contract</option>
      </select>
    </div>
  </li>  
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <div>
      <strong>Sponsorship Required:</strong>
      <span class="me-2">Yes</span>
      <a data-bs-toggle="collapse" href="#editSponsorship" aria-expanded="false" aria-controls="editSponsorship">
        <i class="bi bi-pencil text-primary"></i>
      </a>
    </div>
    <div class="collapse mt-2" id="editSponsorship">
      <select class="form-select form-select-sm">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>
    </div>
  </li>
</ul>
<div class="text-center mt-4">
  <button class="btn btn-primary">Save Preferences</button>
</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body d-flex">             
              <div class="w-50 border-end pe-4">
                <h3 class="text-center pt-4">Core Skills</h3>
                <div class="d-flex flex-column">
                  <h6 class="d-flex align-items-center">Customer-Centricity <span class="bi bi-award-fill text-warning ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Strategic Thinking <span class="bi bi-award-fill text-warning ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Critical Thinking <span class="bi bi-award-fill text-warning ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Logical Reasoning <span class="bi bi-award-fill text-warning ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Project Management <span class="bi bi-award-fill text-warning ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Relationship Building <span class="bi bi-award-fill text-secondary ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Commercial Acumen <span class="bi bi-award-fill text-secondary ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Collaboration <span class="bi bi-award-fill text-secondary ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Negotiation <span class="bi bi-award-fill text-secondary ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Attention to Detail <span class="bi bi-award-fill text-secondary ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Verbal Communication <span class="bi bi-award-fill text-muted ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Non-Verbal Communication <span class="bi bi-award-fill text-muted ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Organisation <span class="bi bi-award-fill text-muted ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Team Management <span class="bi bi-award-fill text-muted ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Stakeholder Management <span class="bi bi-award-fill text-muted ml-2"></span></h6>
                </div>
              </div>
              <div class="w-50 ps-4">
                <h3 class="text-center pt-4">Technical Skills</h3>
                <div class="d-flex flex-column">
                  <h6 class="d-flex align-items-center">Quantitative Research Design <span class="bi bi-award-fill text-warning ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Statistical Analysis <span class="bi bi-award-fill text-warning ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Presenting Data <span class="bi bi-award-fill text-warning ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Data Cleansing <span class="bi bi-award-fill text-secondary ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Project Management <span class="bi bi-award-fill text-secondary ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Qualitative Research Design <span class="bi bi-award-fill text-muted ml-2"></span></h6>
                  <h6 class="d-flex align-items-center">Qualitative Data Analysis <span class="bi bi-award-fill text-muted ml-2"></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body profile-card pt-4">
              <h4 class="text-center">Behavior</h4>
              <canvas id="radarChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#radarChart'), {
                    type: 'radar',
                    data: {
                      labels: ['Curiosity', 'Practicality', 'Discipline', 'Adaptability', 'Sociability', 'Reflectiveness', 'Compassion', 'Confidence', 'Resilience', 'Sensitivity'],
                      datasets: [{
                        label: 'Your behavior graph',
                        data: [65, 59, 90, 81, 56, 81, 96, 55, 40, 89],
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                      }]
                    },
                    options: { elements: { line: { borderWidth: 3 } } }
                  });
                });
              </script>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body profile-card pt-4">
              <h4 class="text-center">Values</h4>
              <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
              {{-- <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#polarAreaChart'), {
                    type: 'radar',
                    data: {
                      labels: ['Security', 'Achievement', 'Universalism', 'Benevolence', 'Conformity', 'Tradition', 'Hedonism', 'Power', 'Self-Direction', 'Stimulation'],
                      datasets: [{
                        label: 'Your value graph',
                        data: [17, 16, 7, 3, 14, 6, 26, 19, 11, 2],
                        fill: true,
                        backgroundColor: 'rgba(133, 250, 240, 0.2)',
                        borderColor: 'rgb(68, 242, 248)',
                      }]
                    }
                  });
                });
              </script> --}}

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  const labels = {!! json_encode(array_keys($valueScores)) !!};
                  const data = {!! json_encode(array_values($valueScores)) !!};
              
                  new Chart(document.querySelector('#polarAreaChart'), {
                    type: 'radar',
                    data: {
                      labels: labels,
                      datasets: [{
                        label: 'Your value graph',
                        data: data,
                        fill: true,
                        backgroundColor: 'rgba(133, 250, 240, 0.2)',
                        borderColor: 'rgb(68, 242, 248)',
                      }]
                    }
                  });
                });
              </script>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection