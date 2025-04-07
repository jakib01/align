@extends('master_layout.candidate_dashboard_master')
@section('behaviour_assesment')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Behaviour Assesments</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Behaviour Assesments</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-4">
        <div class="card assessment-card">
          <div class="card-body text-center">
            <h5 class="card-title">Compassion VS Confidence</h5>
            <p class="card-text">Test your core skills and technical skills and knowledge in your field.</p>
            <a href="{{ route('CompassionVsConfidence') }}" class="btn btn-primary"> Assessment Library</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card assessment-card">
          <div class="card-body text-center">
            <h5 class="card-title">Curiosity VS Practicality</h5>
            <p class="card-text">Understand your workplace behavior and how you interact with others.</p>
            <a href="{{route('CuriosityVsPracticality')}}" class="btn btn-primary">Start Assessment</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card assessment-card">
          <div class="card-body text-center">
            <h5 class="card-title">Discipline VS Adaptability</h5>
            <p class="card-text">Discover your core values and how they align with your work.</p>
            <a href="{{route('DisciplineVsAdaptability')}}" class="btn btn-primary">Start Assessment</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card assessment-card">
          <div class="card-body text-center">
            <h5 class="card-title">Resillience VS Sensitivity</h5>
            <p class="card-text">Test your core skills and technical skills and knowledge in your field.</p>
            <a href="{{route('ResilienceVsSensitivity')}}" class="btn btn-primary"> Assessment Library</a>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card assessment-card">
          <div class="card-body text-center">
            <h5 class="card-title">Sociobility VS Reflectiveness</h5>
            <p class="card-text">Understand your workplace behavior and how you interact with others.</p>
            <a href="{{route('SociobilityVsReflectiveness')}}" class="btn btn-primary">Start Assessment</a>
          </div>
        </div>
      </div>

      
    </div>

  </section>

</main>
@endsection