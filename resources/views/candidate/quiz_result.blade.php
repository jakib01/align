@extends('master_layout.candidate_dashboard_master')
@section('quiz_result')

{{-- <h1>hello</h1> --}}

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Quiz Results</h1>
  </div>

  <section class="section">
    <div class="container">
      @if(empty($scores))
        <div class="alert alert-warning">
          <p>No quiz results found. Please complete the quiz first.</p>
        </div>
      @else
        <h5>Your Value Category Scores (Percentage %):</h5>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Value Category</th>
              <th>Score (%)</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($scores as $category => $score)
              <tr>
                <td>{{ $category }}</td>
                <td>{{ $score }}%</td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <a href="/" class="btn btn-primary">Take Quiz Again</a>
      @endif
    </div>
  </section>

</main>

@endsection