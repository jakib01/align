<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Results</title>
</head>
<body>
    <h2>Your Test Results</h2>
    <p>Sociability Score: {{ $sociability_percentage }}%</p>
    <p>Reflectiveness Score: {{ $reflectiveness_percentage }}%</p>

    <h3>Interpretation:</h3>
    @if ($total_sociability > $total_reflectiveness)
        <p><strong>You are more sociable.</strong></p>
    @elseif ($total_sociability < $total_reflectiveness)
        <p><strong>You are more reflective.</strong></p>
    @else
        <p><strong>You have a balanced approach.</strong></p>
    @endif

    {{-- <a href="{{ url('/sociability-test/' . request()->input('candidate_id')) }}">Retake Test</a> --}}
</body>
</html>
