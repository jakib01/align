<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Results</title>
</head>
<body>
    <h2>Your Test Results</h2>
    <p>Curiosity: {{ $curiosity_percentage }}%</p>
    <p>Practicality: {{ $practicality_percentage }}%</p>

    <h3>Interpretation:</h3>
    @if ($total_curiosity > $total_practicality)
        <p><strong>You are more Curious.</strong></p>
    @elseif ($total_curiosity < $total_practicality)
        <p><strong>You are more practical.</strong></p>
    @else
        <p><strong>You have a balanced approach.</strong></p>
    @endif

    {{-- <a href="{{ url('/sociability-test/' . request()->input('candidate_id')) }}">Retake Test</a> --}}

    <a href="{{ route('behaviour.assesment') }}">Back to Behaviour Assesment</a>
</body>
</html>
