<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Results</title>
</head>
<body>
    <h2>Your Test Results</h2>
    <p>Discipline: {{ $discipline_percentage }}%</p>
    <p>Adaptability: {{ $adaptability_percentage }}%</p>

    <h3>Interpretation:</h3>
    @if ($total_discipline > $total_adaptability)
        <p><strong>You are more Disciplined.</strong></p>
    @elseif ($total_discipline < $total_adaptability)
        <p><strong>You are more adaptability.</strong></p>
    @else
        <p><strong>You have a balanced approach.</strong></p>
    @endif

    {{-- <a href="{{ url('/sociability-test/' . request()->input('candidate_id')) }}">Retake Test</a> --}}

    <a href="{{ route('behaviour.assesment') }}">Back to Behaviour Assesment</a>
</body>
</html>
