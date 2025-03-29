@extends('master_layout.candidate_dashboard_master')
@section('career_insight')


<style>
    .insight-section {
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 10px;
        margin-bottom: 2rem;
    }

    .insight-section h3 {
        margin-bottom: 1.5rem;
        color: #343a40;
        font-weight: 600;
    }

    .insight-card {
        border: 1px solid #dee2e6;
        border-radius: 10px;
        padding: 1.5rem;
        background-color: #ffffff;
        transition: box-shadow 0.3s;
    }

    .insight-card:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .insight-card h4 {
        margin-bottom: 1rem;
        color: #007bff;
        font-weight: 500;
    }

    .insight-card p {
        margin-bottom: 0.5rem;
        color: #6c757d;
    }

    .insight-card .insight-value {
        font-size: 1.25rem;
        color: #343a40;
        font-weight: 600;
    }

    .chart-container {
        width: 100%;
        height: 300px;
        margin-top: 1.5rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>


<main id="main" class="main">
    <!-- ======= Career Insights Page ======= -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Career Insights</h2>

        <div class="row">
            <!-- Fastest Growing Industries Section -->
            <div class="col-md-4">
                <div class="insight-section">
                    <h3>Fastest Growing Industries for Your Skills</h3>
                    <div class="insight-card">
                        <h4>Industry 1</h4>
                        <p class="insight-value">+25% growth</p>
                        <p>Over the last year, this industry has seen significant growth for individuals with your skill
                            set.</p>
                    </div>
                    <div class="insight-card">
                        <h4>Industry 2</h4>
                        <p class="insight-value">+20% growth</p>
                        <p>This industry is also expanding, offering numerous opportunities for your skills.</p>
                    </div>
                </div>
            </div>

            <!-- Career Transitions Section -->
            <div class="col-md-4">
                <div class="insight-section">
                    <h3>Career Transitions in the Last 12 Months</h3>
                    <div class="insight-card">
                        <h4>Transition 1</h4>
                        <p class="insight-value">40% of people moved to X Industry</p>
                        <p>Many individuals with your skills have transitioned to this industry over the past year.</p>
                    </div>
                    <div class="insight-card">
                        <h4>Transition 2</h4>
                        <p class="insight-value">30% of people moved to Y Industry</p>
                        <p>This industry is another popular choice for people with your background.</p>
                    </div>
                </div>
            </div>

            <!-- Skill Transferability Section -->
            <div class="col-md-4">
                <div class="insight-section">
                    <h3>Skill Transferability</h3>
                    <div class="insight-card">
                        <h4>Top Transferable Skills</h4>
                        <p>Your skills are highly transferable to the following industries:</p>
                        <ul>
                            <li>Industry A</li>
                            <li>Industry B</li>
                            <li>Industry C</li>
                        </ul>
                        <div class="chart-container">
                            <!-- Placeholder for a chart -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-4">
            <button type="button" class="btn btn-primary">Explore More Career Insights</button>
        </div>
    </div>
    <!-- ======= End Career Insights Page ======= -->
</main><!-- End #main -->



@endsection