

@extends('master_layout.candidate_dashboard_master')
@section('behaviour_result')

<main id="main" class="main">

  <div class="pagetitle">
    <nav><h6></h6></nav>
  </div>

  

  <section class="section">
    <div class="container">
        <h2>Your Behaviour Assesment Test Results</h2>
    <p>Thank you for taking the test. Here are your results:</p>

    @if(!empty($behaviourScores))
        <table>
            <thead>
                <tr>
                    <th>Trait</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($behaviourScores as $trait => $score)
                    <tr>
                        <td style="padding-right: 20px;">{{ ucfirst(str_replace('_', ' ', $trait)) }}</td>
                        <td>{{ $score }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No assessment data available.</p>
    @endif
  </section>

</main>

<!-- Scripts -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    // Clear all quiz page selections from localStorage
    for (let i = 1; i <= 5; i++) {
        localStorage.removeItem(`quiz_page_${i}`);
    }
</script>
<style>
  .word-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
  }

  .word-btn {
    padding: 10px 15px;
    border: 1px solid #007bff;
    background-color: lightblue;
    cursor: pointer;
    transition: 0.3s;
    width: 120px;
    text-align: center;
  }

  .word-btn.selected {
    background-color: #007bff;
    color: white;
  }

  .word-bank-page {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }

  .word-bank-page[style*="display: block"] {
    opacity: 1;
  }

  .pagination-controls {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
  }
</style>


@endsection