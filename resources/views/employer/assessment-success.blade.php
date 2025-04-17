<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assessment Completed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white shadow-xl rounded-2xl p-8 max-w-md text-center">
    <h1 class="text-2xl font-bold text-green-600 mb-4">✅ Assessment Completed</h1>
    <p class="text-gray-700 mb-2">
        You have successfully completed the <span class="font-semibold text-black">{{ $assessmentName }} Assessment</span>.
    </p>

    <a href="{{ url('/') }}" class="inline-block mt-6 bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-lg transition">
        Go to Dashboard
    </a>
</div>

</body>
</html>
