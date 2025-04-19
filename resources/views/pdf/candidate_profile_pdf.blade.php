<!DOCTYPE html>
<html>
<head>
    <title>Candidate Assessment Report</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
            position: relative;
        }

        .watermark {
            position: fixed;
            top: 35%;
            left: 15%;
            width: 70%;
            text-align: center;
            font-size: 60px;
            color: rgba(180, 180, 180, 0.1);
            transform: rotate(-30deg);
            z-index: 0;
        }

        .content {
            position: relative;
            z-index: 1;
        }

        h1 {
            text-align: center;
        }

        .section {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }

        .signature img {
            width: 150px;
        }

        .signature-label {
            margin-top: 10px;
            font-weight: bold;
        }

    </style>
</head>
<body>

    <div class="watermark">Align</div>

    <div class="content">
        <h1>Candidate Assessment Report</h1>

        <p><strong>Name:</strong> {{ $candidate->candidate_name }}</p>
        <p><strong>Email:</strong> {{ $candidate->email }}</p>

        <div class="section">
            <h3>Behavior Assessment</h3>
            <p><strong>Completed At:</strong> {{ $behaviourassessmentTakenDate ? $behaviourassessmentTakenDate->format('d M Y') : 'N/A' }}</p>
            <table>
                <thead><tr><th>Trait</th><th>Score</th></tr></thead>
                <tbody>
                    @foreach($behaviourScores as $trait => $score)
                        <tr><td>{{ ucfirst($trait) }}</td><td>{{ $score }}%</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="section">
            <h3>Value Assessment</h3>
            <p><strong>Completed At:</strong> {{ $valueassessmentTakenDate ? \Carbon\Carbon::parse($valueassessmentTakenDate)->format('d M Y') : 'N/A' }}</p>
            <table>
                <thead><tr><th>Trait</th><th>Score</th></tr></thead>
                <tbody>
                    @foreach($valueScores as $trait => $score)
                        <tr><td>{{ ucfirst($trait) }}</td><td>{{ $score }}%</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <div class="signature">
            <img src="{{public_path('img/mysig.png')}}" alt="" />
            <div class="signature-label">Authorized Signatory</div>
        </div> --}}

        @php
    $path = public_path('assets/img/mysig.png'); // Path to the image file
    $imageType = pathinfo($path, PATHINFO_EXTENSION);
    $imageData = base64_encode(file_get_contents($path));
@endphp

{{-- <img src="data:image/{{ $imageType }};base64,{{ $imageData }}" alt="Signature" width="150"> --}}

<div class="signature">
    <img src="data:image/{{ $imageType }};base64,{{ $imageData }}" alt="Signature" width="150">
            <div class="signature-label">Authorized Signatory</div>
        </div>


    </div>
</body>
</html>
