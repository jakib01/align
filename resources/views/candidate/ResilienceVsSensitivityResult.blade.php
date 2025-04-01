<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Results</title>
</head>
<body>
    <h2>Your Test Results</h2>
    <p>Resilient: {{ $resilience_percentage }}%</p>
    <p>Sensitive Score: {{ $sensitivity_percentage }}%</p>

    <h3>Interpretation:</h3>
    @if ($total_resilience > $total_sensitivity)
        <p><strong>You are more Resilient.</strong></p>
    @elseif ($total_sociability < $total_reflectiveness)
        <p><strong>You are more Sensitive.</strong></p>
    @else
        <p><strong>You have a balanced approach.</strong></p>
    @endif

    {{-- <a href="{{ url('/sociability-test/' . request()->input('candidate_id')) }}">Retake Test</a> --}}
</body>
</html>
