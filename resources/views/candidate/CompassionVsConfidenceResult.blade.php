<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Results</title>
</head>
<body>
    <h2>Your Test Results</h2>
    <p>Compassion: {{ $compassion_percentage }}%</p>
    <p>Confidence: {{ $confidence_percentage }}%</p>

    <h3>Interpretation:</h3>
    @if ($total_compassion > $total_confidence)
        <p><strong>You are more Compassionate.</strong></p>
    @elseif ($total_compassion < $total_confidence)
        <p><strong>You are more confident.</strong></p>
    @else
        <p><strong>You have a balanced approach.</strong></p>
    @endif

    {{-- <a href="{{ url('/sociability-test/' . request()->input('candidate_id')) }}">Retake Test</a> --}}

    <a href="{{ route('behaviour.assesment') }}">Back to Behaviour Assesment</a>
</body>
</html>
