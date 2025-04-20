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
                <img id="profilePhoto" 
                src="{{ asset($candidate->profile_photo ?? 'assets/img/profile-img.jpg') }}" 
                alt="Profile" 
                class="rounded-circle mb-3" 
                style="width: 120px; height: 120px; padding-top: 20px;">
                <form action="{{ route('candidate.updatePhoto') }}" method="POST" enctype="multipart/form-data" class="mt-2">
                  @csrf
                  <input type="file" name="profile_photo" id="photoInput" accept="image/*" class="form-control mb-2">
                  <button type="submit" class="btn btn-sm btn-primary">Upload New Photo</button>
              </form>
              
                <h2 class="mt-3">{{ $candidate->candidate_name }}</h2>
                <div class="social-links mt-2 d-flex justify-content-center">
                  <a href="#" class="twitter mx-2"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook mx-2"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram mx-2"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin mx-2"><i class="bi bi-linkedin"></i></a>
                </div>
                <div class="mt-4">
                  {{-- <a href="#" class="btn btn-primary" download="Kevin-Anderson-Profile.pdf">
                    <i class="bi bi-download me-2"></i>Download JobPass
                  </a> --}}

                  <a href="{{ route('candidate.download.pdf') }}" class="btn btn-primary">
                    <i class="bi bi-download me-2"></i>Download JobPass
                  </a>

                </div>
              </div> 
              <div class="w-50 ps-4">
              {{-- <h3 class="text-center pt-4">Job Preferences</h3>
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
</div> --}}

<div id="jobPreferencesSection">
  <h3 class="text-center pt-4">Job Preferences</h3>
  <ul class="list-group list-group-flush">

    {{-- Location --}}
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>Location:</strong>
        <span class="me-2" id="locationDisplay">{{ $jobPreferences['location'] ?? '' }}</span>
        <a data-bs-toggle="collapse" href="#editLocation">
          <i class="bi bi-pencil text-primary"></i>
        </a>
      </div>
      <div class="collapse mt-2" id="editLocation">
        <select class="form-select form-select-sm preference-select" data-key="location">
          @foreach(['London', 'Liverpool', 'Manchester', 'Birmingham', 'Edinburgh', 'Glasgow'] as $city)
            <option value="{{ $city }}" {{ ($jobPreferences['location'] ?? '') === $city ? 'selected' : '' }}>{{ $city }}</option>
          @endforeach
        </select>
      </div>
    </li>

    {{-- Seniority --}}
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>Seniority:</strong>
        <span class="me-2" id="seniorityDisplay">{{ $jobPreferences['seniority'] ?? '' }}</span>
        <a data-bs-toggle="collapse" href="#editSeniority">
          <i class="bi bi-pencil text-primary"></i>
        </a>
      </div>
      <div class="collapse mt-2" id="editSeniority">
        <select class="form-select form-select-sm preference-select" data-key="seniority">
          @foreach(['Junior', 'Mid-level', 'Senior'] as $level)
            <option value="{{ $level }}" {{ ($jobPreferences['seniority'] ?? '') === $level ? 'selected' : '' }}>{{ $level }}</option>
          @endforeach
        </select>
      </div>
    </li>

    {{-- Salary --}}
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>Salary:</strong>
        <span class="me-2" id="salaryDisplay">{{ $jobPreferences['salary'] ?? '' }}</span>
        <a data-bs-toggle="collapse" href="#editSalary">
          <i class="bi bi-pencil text-primary"></i>
        </a>
      </div>
      <div class="collapse mt-2" id="editSalary">
        <select class="form-select form-select-sm preference-select" data-key="salary">
          @foreach(['30000-40000', '40000-50000', '50000-60000', '60000-70000'] as $range)
            <option value="{{ $range }}" {{ ($jobPreferences['salary'] ?? '') === $range ? 'selected' : '' }}>£{{ str_replace('-', ' - £', $range) }}</option>
          @endforeach
        </select>
      </div>
    </li>

    {{-- Contract --}}
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>Contract:</strong>
        <span class="me-2" id="contractDisplay">{{ $jobPreferences['contract'] ?? '' }}</span>
        <a data-bs-toggle="collapse" href="#editContract">
          <i class="bi bi-pencil text-primary"></i>
        </a>
      </div>
      <div class="collapse mt-2" id="editContract">
        <select class="form-select form-select-sm preference-select" data-key="contract">
          @foreach(['Full-time', 'Part-time', 'Contract'] as $type)
            <option value="{{ $type }}" {{ ($jobPreferences['contract'] ?? '') === $type ? 'selected' : '' }}>{{ $type }}</option>
          @endforeach
        </select>
      </div>
    </li>

    {{-- Sponsorship --}}
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <strong>Sponsorship Required:</strong>
        <span class="me-2" id="sponsorship_requiredDisplay">{{ $jobPreferences['sponsorship_required'] ?? '' }}</span>
        <a data-bs-toggle="collapse" href="#editSponsorship">
          <i class="bi bi-pencil text-primary"></i>
        </a>
      </div>
      <div class="collapse mt-2" id="editSponsorship">
        <select class="form-select form-select-sm preference-select" data-key="sponsorship_required">
          @foreach(['Yes', 'No'] as $option)
            <option value="{{ $option }}" {{ ($jobPreferences['sponsorship_required'] ?? '') === $option ? 'selected' : '' }}>{{ $option }}</option>
          @endforeach
        </select>
      </div>
    </li>
  </ul>
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
        
              {{-- Debug Output --}}
              {{-- <pre>{{ json_encode($behaviourScores, JSON_PRETTY_PRINT) }}</pre> --}}
        
              @if (!empty($behaviourScores))
                <canvas id="radarChart" style="max-height: 400px;"></canvas>
                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    const labels = {!! json_encode(array_keys($behaviourScores)) !!};
                    const data = {!! json_encode(array_values($behaviourScores)) !!};
        
                    // Make it accessible in browser console for debugging
                    window.labels = labels;
                    window.data = data;
        
                    console.log("Behavior Labels:", labels);
                    console.log("Behavior Data:", data);
        
                    new Chart(document.querySelector('#radarChart'), {
                      type: 'radar',
                      data: {
                        labels: labels,
                        datasets: [{
                          label: 'Your behavior graph',
                          data: data,
                          fill: true,
                          backgroundColor: 'rgba(255, 99, 132, 0.2)',
                          borderColor: 'rgb(255, 99, 132)',
                        }]
                      },
                      options: {
                        scales: {
                          r: {
                            beginAtZero: true,
                            suggestedMax: 100
                          }
                        },
                        elements: {
                          line: {
                            borderWidth: 3
                          }
                        }
                      }
                    });
                  });
                </script>
              @else
                <div class="text-center text-muted pt-5">
                  <p>You didn't participate in the behavior assessment test.</p>
                </div>
              @endif
            </div>

            @php
          $candidate = auth()->guard('candidate')->user();
          $completed = json_decode($candidate?->behaviour_assesment_completed_at, true) ?? [];

          $requiredTests = ['t1', 't2', 't3', 't4', 't5'];
          $allCompleted = !array_diff($requiredTests, array_keys($completed));

          $latestDate = null;
          if ($allCompleted) {
              $latestDate = collect($completed)->sort()->last();
              $isWithinOneYear = \Carbon\Carbon::parse($latestDate)->addYear()->isFuture();
          } else {
              $isWithinOneYear = false;
          }
         @endphp

            @if ($allCompleted && $isWithinOneYear)
                {{-- ✅ All tests completed and recent – Show Result button --}}
                <a href="{{ route('behaviour.assesment.result') }}" class="btn btn-success">
                    View Result
                </a>

                @endif
            
            


          </div>

          <p>Assessment taken date: {{ $behaviourassessmentTakenDate ? \Carbon\Carbon::parse($behaviourassessmentTakenDate)->format('d M Y') : 'N/A' }}</p>
          <p>Assessment expire date: {{ $behaviourassessmentExpireDate ? \Carbon\Carbon::parse($behaviourassessmentExpireDate)->format('d M Y') : 'N/A' }}</p>

        </div>
        
        
        <div class="col-md-6">
          <div class="card">
            <div class="card-body profile-card pt-4">
              <h4 class="text-center">Values</h4>
        
              @if (!empty($valueScores))
                <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
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
              @else
                <div class="text-center text-muted pt-5">
                  <p>You didn't participate in the value assessment test.</p>
                </div>
              @endif
        
            </div>
            @php
            $completedAt = auth()->guard('candidate')->user()->value_assessment_completed_at;
            $isWithinOneYear = $completedAt && \Carbon\Carbon::parse($completedAt)->addYear()->isFuture();
        @endphp
  
        @if ($completedAt)
            {{-- ✅ Show result button --}}
            <a href="{{route('value.result')}}" class="btn btn-success">
                View Result
            </a>
        @endif
          </div>
          
          <p>Assessment taken date: {{ $valueassessmentTakenDate ? \Carbon\Carbon::parse($valueassessmentTakenDate)->format('d M Y') : 'N/A' }}</p>
          <p>Assessment expire date: {{ $valueassessmentExpireDate ? \Carbon\Carbon::parse($valueassessmentExpireDate)->format('d M Y') : 'N/A' }}</p>

        </div>
        
      </div>
    </div>
  </section>
</main>

{{-- <script>
  document.querySelectorAll('.preference-select').forEach(select => {
    select.addEventListener('change', function () {
      const key = this.dataset.key;
      const value = this.value;

      fetch(`/candidate/candidates/{{ $candidate->id }}/preferences/update-field`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json', // Important to get proper JSON back
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ key, value })
      })
      .then(async response => {
        if (!response.ok) {
          const errorText = await response.text();
          throw new Error(errorText);
        }
        return response.json();
      })
      .then(data => {
        if (data.success) {
          document.getElementById(`${key}Display`).textContent = value;
        } else {
          alert(data.message || 'Failed to update. Try again.');
        }
      })
      .catch(err => {
        console.error('Update failed:', err);
        alert('Something went wrong. Check console for details.');
      });
    });
  });
</script> --}}

<script>
  document.querySelectorAll('.preference-select').forEach(select => {
    // Set the initial text in the display span
    const key = select.dataset.key;
    const selectedOption = select.options[select.selectedIndex].text;
    const display = document.getElementById(`${key}Display`);
    if (display) {
      display.textContent = selectedOption;
    }

    // Listen for changes (realtime update logic already here)
    select.addEventListener('change', function () {
      const value = this.value;

      fetch(`/candidate/candidates/{{ $candidate->id }}/preferences/update-field`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ key, value })
      })
      .then(async response => {
        if (!response.ok) {
          const errorText = await response.text();
          throw new Error(errorText);
        }
        return response.json();
      })
      .then(data => {
        if (data.success) {
          document.getElementById(`${key}Display`).textContent = select.options[select.selectedIndex].text;
        } else {
          alert(data.message || 'Failed to update. Try again.');
        }
      })
      .catch(err => {
        console.error('Update failed:', err);
        alert('Something went wrong. Check console for details.');
      });
    });
  });
</script>

<script>
  document.getElementById('photoInput').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function (e) {
      document.getElementById('profilePhoto').src = e.target.result;
    };

    if (file) {
      reader.readAsDataURL(file);
    }
  });
</script>



@endsection