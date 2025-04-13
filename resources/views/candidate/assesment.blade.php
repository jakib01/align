@extends('master_layout.candidate_dashboard_master')
@section('assesment')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Assesments</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Assesments</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-4">
        <div class="card assessment-card">
          <div class="card-body text-center">
            <h5 class="card-title">Skills</h5>
            <p class="card-text">Test your core skills and technical skills and knowledge in your field.</p>
            <a href="{{ route('technical.assesment') }}" class="btn btn-primary"> Assessment Library</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card assessment-card">
          <div class="card-body text-center">
            <h5 class="card-title">Behavior</h5>
            <p class="card-text">Understand your workplace behavior and how you interact with others.</p>
            {{-- <a href="{{route('CompassionVsConfidence')}}" class="btn btn-primary">Start Assessment</a> --}}
            @php
            $candidate = auth()->guard('candidate')->user();
            $completed = json_decode($candidate?->behaviour_assesment_completed_at, true) ?? [];
        
            $requiredTests = ['t1', 't2', 't3', 't4', 't5'];
            $allCompleted = !array_diff($requiredTests, array_keys($completed));
        @endphp
        
        @if ($allCompleted)
            {{-- ✅ All tests completed – Show Result button --}}
            <a href="{{ route('behaviour.assesment.result') }}" class="btn btn-success">
                View Result
            </a>
        @else
            {{-- 🟢 Incomplete – Show Start button --}}
            <a href="{{ route('CompassionVsConfidence') }}" class="btn btn-primary">
                Start Assessment
            </a>
        @endif
        

          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card assessment-card">
          <div class="card-body text-center">
            <h5 class="card-title">Values</h5>
            <p class="card-text">Discover your core values and how they align with your work.</p>
            {{-- <a href="{{url('candidate/value/assessment/1')}}" class="btn btn-primary">Start Assessment</a> --}}
            {{-- @php
            $assessmentDone = auth()->guard('candidate')->user()->value_assesment_completed_at;
            $disabled = $assessmentDone && \Carbon\Carbon::parse($assessmentDone)->addYear()->isFuture();
        @endphp

        <a href="{{ $disabled ? '#' : url('candidate/value/assessment/1') }}"
          class="btn btn-primary {{ $disabled ? 'disabled' : '' }}">
          {{ $disabled ? 'Assessment Completed' : 'Start Assessment' }}
        </a> --}}

              @php
          $completedAt = auth()->guard('candidate')->user()->value_assessment_completed_at;
          $isWithinOneYear = $completedAt && \Carbon\Carbon::parse($completedAt)->addYear()->isFuture();
      @endphp

      @if ($completedAt)
          {{-- ✅ Show result button --}}
          <a href="{{route('value.result')}}" class="btn btn-success">
              View Result
          </a>
      @else
          {{-- 🟢 Show start button --}}
          <a href="{{ url('candidate/value/assessment/1') }}" class="btn btn-primary">
              Start Assessment
          </a>
      @endif

          </div>
        </div>
      </div>
    </div>
  </section>

</main>

{{-- <script>
  document.addEventListener("DOMContentLoaded", function () {
      const startBtn = document.querySelector('a[href="{{ route('CompassionVsConfidence') }}"]');
  
      if (startBtn) {
          startBtn.addEventListener("click", function () {
              // Clear old localStorage tracking
              const keysToClear = [
                  "CompassionVsConfidence_submitted",
                  "CuriosityVsPracticality_submitted",
                  "DisciplineVsAdaptability_submitted",
                  "ResilienceVsSensitivity_submitted",
                  "SocioblityVsReflectiveness_submitted",
                  "nextPage"
              ];
              keysToClear.forEach(key => localStorage.removeItem(key));
          });
      }
  });
  </script> --}}

@endsection