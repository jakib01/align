@extends('master_layout.candidate_dashboard_master')
@section('quiz')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Values Assessment</h1>
        </div>

        <section class="section">
            <div class="container">
                <div id="words-container" class="word-grid">
                    @foreach ($words as $word)
                        <button type="button"
                                class="word-btn"
                                data-word="{{ $word }}"
                                onclick="handleWordClick(this)">
                            {{ $word }}
                            <span class="order-badge" data-word="{{ $word }}"></span>
                        </button>
                    @endforeach
                </div>

                <div class="pagination-controls">
                    <button type="button" class="btn btn-warning" onclick="clearSelections()">Clear Selections</button>

                    @if ($page > 1)
                        <a href="{{ url('candidate/value/assessment/' . ($page - 1)) }}" class="btn btn-secondary">
                            Previous
                        </a>
                    @endif

                    @if ($page < $totalPages)
                        <a href="{{ url('candidate/value/assessment/' . ($page + 1)) }}" class="btn btn-primary" onclick="saveToLocalStorage({{ $page }})">
                            Next
                        </a>
                    @else
                        <button type="button" class="btn btn-success" onclick="finalSubmit()">Submit</button>
                    @endif
                </div>
            </div>
        </section>

    </main>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        let selected = JSON.parse(localStorage.getItem('selected_words')) || {};

        const page = {{ $page }};
        const totalPages = {{ $totalPages }};
        const localKey = `quiz_page_${page}`;

        // Load previous selections from localStorage on page load
        window.onload = () => {
            const previous = selected[localKey] || [];
            previous.forEach((val, index) => {
                const btn = document.querySelector(`.word-btn[data-word="${val}"]`);
                if (btn) {
                    btn.classList.add('selected');
                    updateOrderBadge(btn, index + 1);
                }
            });
        };

        // Handle word selection and limit to 5 words per page
        function handleWordClick(btn) {
            const val = btn.dataset.word;
            const current = selected[localKey] || [];

            if (current.includes(val)) {
                selected[localKey] = current.filter((v) => v !== val);
                btn.classList.remove('selected');
            } else {
                if (current.length < 5) {
                    current.push(val);
                    selected[localKey] = current;
                    btn.classList.add('selected');
                } else {
                    alert("You can select only 5 words per page!");
                    return;
                }
            }

            localStorage.setItem('selected_words', JSON.stringify(selected));
            updateAllOrderBadges();
        }

        // Clear all selections for the current page
        function clearSelections() {
            selected[localKey] = [];
            localStorage.setItem('selected_words', JSON.stringify(selected));
            updateAllOrderBadges();
            document.querySelectorAll('.word-btn').forEach((btn) => {
                btn.classList.remove('selected');
                btn.querySelector('.order-badge').innerText = '';
            });
        }

        // Save data to localStorage when navigating between pages
        function saveToLocalStorage(page) {
            localStorage.setItem('selected_words', JSON.stringify(selected));
        }

        // Submit all data on the final page
        function finalSubmit() {
            fetch("{{ url('candidate/value/assessment/submit') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ selected_words: selected })
            })
                .then((response) => {
                    if (!response.ok) {
                        return response.json().then((data) => {
                            alert(data.error || 'Error submitting selections!');
                        });
                    } else {
                        alert('Selections submitted successfully!');
                        localStorage.removeItem('selected_words');
                        window.location.href = "{{ route('value.result') }}";
                    }
                })
                .catch((error) => console.error('Error:', error));
        }

        // Update all order badges dynamically
        function updateAllOrderBadges() {
            const current = selected[localKey] || [];
            document.querySelectorAll('.word-btn').forEach((btn) => {
                const val = btn.dataset.word;
                const orderBadge = btn.querySelector('.order-badge');
                if (current.includes(val)) {
                    const order = current.indexOf(val) + 1;
                    updateOrderBadge(btn, order);
                } else {
                    orderBadge.innerText = ''; // Clear if not selected
                }
            });
        }

        // Update order badge for a selected button
        function updateOrderBadge(btn, order) {
            const badge = btn.querySelector('.order-badge');
            badge.innerText = order;
        }
    </script>

    <!-- Updated CSS -->
    <style>
        .word-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .word-btn {
            padding: 12px;
            border: 1px solid #007bff;
            background-color: #f1f1f1;
            cursor: pointer;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            position: relative;
            transition: 0.3s;
        }

        .word-btn:hover {
            background-color: #e2e6ea;
        }

        .word-btn.selected {
            background-color: #007bff;
            color: white;
        }

        .word-btn .order-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: white;
            color: #007bff;
            font-size: 12px;
            border-radius: 50%;
            padding: 3px 6px;
            border: 1px solid #007bff;
        }

        .pagination-controls {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
    </style>

@endsection
