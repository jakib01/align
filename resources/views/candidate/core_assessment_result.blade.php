@extends('master_layout.candidate_dashboard_master')
@section('core_assessment_result')

{{-- <h1>hello</h1> --}}

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Quiz Results</h1>
  </div>

  <section class="section">
    <h2>Assessment Complete</h2>
    <p>Total Score: {{ $score }}</p>

    @php
        $badge = '❌ No Badge';
        $percentage = round(($score / 36) * 100); // Assuming 36 is the max score
        $reputation = 'Needs development or fit review';
        $range = '0–21';

        if ($score >= 33) {
            $badge = '🥇 Gold';
            $range = '33–36';
            $reputation = 'Elite, future leader, pre-qualified';
        } elseif ($score >= 28) {
            $badge = '🥈 Silver';
            $range = '28–32';
            $reputation = 'High performer, dependable';
        } elseif ($score >= 22) {
            $badge = '🥉 Bronze';
            $range = '22–27';
            $reputation = 'Emerging talent, coachable';
        }
    @endphp

    <p>Badge: {{ $badge }}</p>
    <p>Score Range: {{ $range }}</p>
    <p>Approx %: {{ $percentage }}%</p>
    <p>Reputation: {{ $reputation }}</p>

  </section>

</main>


@endsection