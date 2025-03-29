@extends('master_layout.admin_master')

@section('assessment_skills')

<main id="main" class="main py-5 bg-light">
    <div class="container-fluid">
        <h1 class="text-center mb-4">Skills Assessment</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <form action="{{ route('assessment.store', 'skills') }}" method="POST">
                    @csrf
                    <!-- Add Skills Assessment Questions -->
                    <div class="form-group">
                        <label for="question1">Question 1: Your technical skill?</label>
                        <input type="text" class="form-control" id="question1" name="question1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection