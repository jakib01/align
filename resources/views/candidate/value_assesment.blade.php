@extends('master_layout.candidate_dashboard_master')
@section('value_assesment')

<main id="main" class="main">

  <div class="pagetitle">
    <nav><h6></h6></nav>
  </div>

  <div class="pagetitle">
    <h1>Values Assessment</h1>
  </div>

  <section class="section">
    <div class="container">
      <div id="word-bank-pages">
        @php
          $pages = [
              ["Variety" => "stimulation", "Stability" => "security", "Ambition" => "achievement", "Equality" => "universalism", "Kindness" => "benevolence", "Obedience" => "conformity", "Heritage" => "tradition", "Pleasure" => "hedonism", "Authority" => "power", "Autonomy" => "self-direction"],
              ["Freedom" => "self-direction", "Challenge" => "stimulation", "Reliability" => "security", "Success" => "achievement", "Justice" => "universalism", "Care" => "benevolence", "Harmony" => "conformity", "Customs" => "tradition", "Fun" => "hedonism", "Influence" => "power"],
              ["Leadership" => "power", "Independence" => "self-direction", "Adventure" => "stimulation", "Predictability" => "security", "Accomplishment" => "achievement", "Protection" => "universalism", "Compassion" => "benevolence", "Structure" => "conformity", "Rituals" => "tradition", "Playfulness" => "hedonism"],
              ["Enjoyment" => "hedonism", "Control" => "power", "Individuality" => "self-direction", "Novelty" => "stimulation", "Comfort" => "security", "Recognition" => "achievement", "Fairness" => "universalism", "Generosity" => "benevolence", "Order" => "conformity", "Preservation" => "tradition"],
              ["Lineage" => "tradition", "Gratification" => "hedonism", "Status" => "power", "Self-Expression" => "self-direction", "Excitement" => "stimulation", "Risk Avoidance" => "security", "Excellence" => "achievement", "Understanding" => "universalism", "Support" => "benevolence", "Respect" => "conformity"]
          ];
        @endphp

        @foreach ($pages as $index => $words)
          <div class="word-bank-page" style="{{ $index === 0 ? '' : 'display:none;' }}">
            <h5>Select up to 5 words that resonate with you:</h5>
            <div class="word-grid">
              @foreach ($words as $word => $category)
                <button class="word-btn" data-value="{{ $category }}">{{ $word }}</button>
              @endforeach
            </div>
          </div>
        @endforeach

        <!-- Pagination Control -->
        <div class="pagination-controls">
          <button id="prev-page" class="btn btn-secondary" disabled>Previous</button>
          <button id="next-page" class="btn btn-primary">Next</button>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- Scripts -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>



 document.addEventListener('DOMContentLoaded', () => {
    const pages = document.querySelectorAll('.word-bank-page');
    const nextPageBtn = document.getElementById('next-page');
    const prevPageBtn = document.getElementById('prev-page');

    // Retrieve current page from localStorage or set default
    let currentPage = localStorage.getItem('currentPage') ? parseInt(localStorage.getItem('currentPage')) : 0;
    
    // Ensure `selectedWordsPerPage` is an array and correctly initialized
    let selectedWordsPerPage = [];
    try {
        selectedWordsPerPage = JSON.parse(localStorage.getItem('selectedWords')) || Array(pages.length).fill([]);
    } catch (error) {
        console.error("Error reading localStorage:", error);
        selectedWordsPerPage = Array(pages.length).fill([]);
    }

    // Function to update page visibility
    const updatePage = () => {
        pages.forEach((page, index) => {
            page.style.display = index === currentPage ? 'block' : 'none';
        });

        prevPageBtn.disabled = currentPage === 0;
        nextPageBtn.innerHTML = currentPage === pages.length - 1 ? 'Submit' : 'Next';
        restoreSelectedWords(currentPage);
    };

    // Get selected words from a page
    const updateSelectedWords = (page) => {
        return Array.from(page.querySelectorAll('.word-btn.selected')).map(btn => btn.getAttribute('data-value'));
    };

    // Handle word selection logic
    const handleWordSelection = (pageIndex, page) => {
        const buttons = page.querySelectorAll('.word-btn');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                if (!button.classList.contains('selected') && selectedWordsPerPage[pageIndex].length >= 5) {
                    alert("You can only select up to 5 words.");
                    return;
                }

                button.classList.toggle('selected');
                selectedWordsPerPage[pageIndex] = updateSelectedWords(page);
                localStorage.setItem('selectedWords', JSON.stringify(selectedWordsPerPage));
                checkNextButtonState();
            });
        });
    };

    // Check if the next button should be disabled
    const checkNextButtonState = () => {
        nextPageBtn.disabled = selectedWordsPerPage[currentPage].length !== 5;
    };

    // Add event listeners to all word buttons
    pages.forEach((page, index) => handleWordSelection(index, page));

    // Handle next button click
    nextPageBtn.addEventListener('click', () => {
        if (selectedWordsPerPage[currentPage].length !== 5) {
            alert('Please select exactly 5 words before proceeding.');
            return;
        }

        if (currentPage < pages.length - 1) {
            currentPage++;
            localStorage.setItem('currentPage', currentPage);
            updatePage();
        } else {
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.content : '';

            if (!csrfToken) {
                console.error("CSRF Token not found.");
                return;
            }

            fetch('/candidate/submit-quiz', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ selectedValues: selectedWordsPerPage })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP Error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => window.location.href = '/candidate/results')
            .catch(error => console.error('Error submitting assessment:', error));
        }
    });

    // Handle previous button click
    prevPageBtn.addEventListener('click', () => {
        if (currentPage > 0) {
            currentPage--;
            localStorage.setItem('currentPage', currentPage);
            updatePage();
        }
    });

    // Restore selected words on page load
    const restoreSelectedWords = (pageIndex) => {
        const buttons = pages[pageIndex].querySelectorAll('.word-btn');
        buttons.forEach(button => {
            if (selectedWordsPerPage[pageIndex].includes(button.getAttribute('data-value'))) {
                button.classList.add('selected');
            } else {
                button.classList.remove('selected');
            }
        });
    };

    updatePage();
});



</script>

<style>
  .word-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
  }

  .word-btn {
    padding: 10px 15px;
    border: 1px solid #007bff;
    background-color: lightblue;
    cursor: pointer;
    transition: 0.3s;
    width: 120px;
    text-align: center;
  }

  .word-btn.selected {
    background-color: #007bff;
    color: white;
  }

  .word-bank-page {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }

  .word-bank-page[style*="display: block"] {
    opacity: 1;
  }

  .pagination-controls {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
  }
</style>


@endsection