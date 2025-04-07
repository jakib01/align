@extends('master_layout.candidate_dashboard_master')
@section('DisciplineVsAdaptability')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Discipline VS Adaptability</h1>
    {{-- <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Behaviour Assesments</li>
      </ol>
    </nav> --}}
  </div>

  <br><br>

  <section class="section">
   
    <form action="{{ url('candidate/DisciplineVsAdaptability/submit') }}" method="POST">
        @csrf
        {{-- <input type="hidden" name="candidate_id" value="{{ $candidate_id }}"> --}}
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
@endsection