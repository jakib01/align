
@extends('master_layout.candidate_master')
@section('candidate_login_assesment')

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
              <a href="{{route('behaviour.assesment')}}" class="btn btn-primary">Start Assessment</a>
            </div>
          </div>
        </div>
  
        <div class="col-lg-4">
          <div class="card assessment-card">
            <div class="card-body text-center">
              <h5 class="card-title">Values</h5>
              <p class="card-text">Discover your core values and how they align with your work.</p>
              <a href="{{route('value.assesment')}}" class="btn btn-primary">Start Assessment</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  
  </main>

@endsection


