@extends('master_layout.candidate_dashboard_master')
@section('coreskill_reasoning')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Core Skill Reasoning</h1>
    {{-- <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Behaviour Assesments</li>
      </ol>
    </nav> --}}
  </div>

  <br><br>

  <h1>Technical Assessment</h1>
<form method="POST" action="{{ route('coreskill.assesment.submit') }}">
    @csrf
    @foreach ($questions as $key=> $question)
        <div>
            <p> {{ $key+1 }}. <strong>{{ $question->prompt }}</strong></p>
            @php $options = json_decode($question->options, true); @endphp
            @foreach ($options as $key => $opt)
                <label>
                    <input type="radio" name="question_{{ $question->id }}" value="{{ $key }}" required>
                    {{ $key }}: {{ $opt['text'] }}
                </label><br>
            @endforeach
        </div>
        <hr>
    @endforeach
    <button type="submit">Submit</button>
</form>


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