@extends('master_layout.employer_assessment_dashboard_master')
@section('DisciplineVsAdaptability')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Page 3 of 5</h1>
    {{-- <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Behaviour Assesments</li>
      </ol>
    </nav> --}}
  </div>

  <br><br>

  <section class="section">

    <form action="{{ url('employer/behavior/DisciplineVsAdaptability/submit') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $link->access_token }}">
        @foreach ($questions as $key=> $question )
            <p>{{ $key+1 }}. {{ $question->statement }}</p>
            <label><input type="radio" name="responses[{{ $question->id }}]" value="strongly_agree" required> Strongly Agree</label>
            <label><input type="radio" name="responses[{{ $question->id }}]" value="agree"> Agree</label>
            <label><input type="radio" name="responses[{{ $question->id }}]" value="neutral"> Neutral</label>
            <label><input type="radio" name="responses[{{ $question->id }}]" value="disagree"> Disagree</label>
            <label><input type="radio" name="responses[{{ $question->id }}]" value="strongly_disagree"> Strongly Disagree</label>

            <br><br>
            @endforeach

        <button type="submit">Submit</button>
    </form>


  </section>

</main>

{{-- <script>
  document.addEventListener("DOMContentLoaded", function () {
      const currentPage = "{{ Request::segment(2) }}";

      // Check if this page is already submitted
      if (localStorage.getItem(currentPage + "_submitted")) {
          // Redirect to next page or dashboard
          const nextPage = localStorage.getItem("nextPage");
          if (nextPage && nextPage !== currentPage) {
              window.location.href = '/candidate/' + nextPage;
          } else {
              window.location.href = '/candidate/dashboard'; // fallback
          }
      }

      // On form submit, store that the page is submitted
      const form = document.querySelector("form");
      if (form) {
          form.addEventListener("submit", function () {
              localStorage.setItem(currentPage + "_submitted", "true");

              const routes = [
                  'CompassionVsConfidence',
                  'CuriosityVsPracticality',
                  'DisciplineVsAdaptability',
                  'ResilienceVsSensitivity',
                  'SocioblityVsReflectiveness'
              ];

              const currentIndex = routes.indexOf(currentPage);
              if (currentIndex >= 0 && currentIndex + 1 < routes.length) {
                  localStorage.setItem("nextPage", routes[currentIndex + 1]);
              } else {
                  localStorage.removeItem("nextPage");
              }
          });
      }
  });
</script> --}}

@endsection
