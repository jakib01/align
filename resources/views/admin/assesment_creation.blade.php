@extends('master_layout.admin_master')

@section('assesment_creation')


<main class="container py-5">
    <h1 class="text-center mb-4">Choose an Assessment</h1>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="{{ route('assessment.skills') }}" class="card text-decoration-none shadow-sm">
                <div class="card-body text-center">
                    <h3>Skills Assessment</h3>
                    <p>Assess your technical and core skills.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('assessment.values') }}" class="card text-decoration-none shadow-sm">
                <div class="card-body text-center">
                    <h3>Values Assessment</h3>
                    <p>Discover your core values.</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('assessment.behaviour') }}" class="card text-decoration-none shadow-sm">
                <div class="card-body text-center">
                    <h3>Behavior Assessment</h3>
                    <p>Analyze your behavioral traits.</p>
                </div>
            </a>
        </div>
    </div>
</main>
@endsection