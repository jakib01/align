@extends('master_layout.candidate_dashboard_master')
@section('result')

<main id="main" class="main">

  <div class="pagetitle">
    <nav><h6></h6></nav>
  </div>

  <div class="pagetitle">
    <h1>Result</h1>
  </div>

  <section class="section">
    <div class="container">
        <ul>
            @foreach ($results as $res)
                {{-- <li><strong>{{ $res->mother_word }}</strong>: {{ $res->total }} points</li> --}}
                <li>
                    <strong>{{ $res->mother_word }}</strong>: {{ $res->total }} points ({{ $res->percentage }}%)
                </li>
            @endforeach
        </ul>
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