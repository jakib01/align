@extends('master_layout.candidate_dashboard_master')
@section('quiz')

{{-- <main id="main" class="main">

  <div class="pagetitle">
    <nav><h6></h6></nav>
  </div>

  <div class="pagetitle">
    <h1>Values Assessment</h1>
  </div>

  <section class="section">
    <div class="container">
        <form method="POST" action="{{ url('candidate/value/assessment/' . $page) }}">
            @csrf
            <div id="words-container">
                @foreach ($words as $word)
                    <div>
                        <input type="checkbox" onclick="handleCheck(this)" value="{{ $word }}">
                        <label>{{ $word }}</label>
                    </div>
                @endforeach
            </div>
        
            <input type="hidden" name="selected_words" id="selected_words">
            
            <div style="margin-top: 20px;">
                @if ($page > 1)
                    <a href="{{ url( 'candidate/value/assessment/'. $page - 1  )}}">
                        <button type="button">Previous</button>
                    </a>
                @endif
        
                <button type="submit">Next</button>
            </div>
        </form>
        
        @if ($errors->any())
            <div style="color:red;">
                @foreach ($errors->all() as $e)
                    <p>{{ $e }}</p>
                @endforeach
            </div>
        @endif
    </div>
  </section>

</main> --}}

<!-- Scripts -->
{{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    let selected = [];

    const localKey = "quiz_page_{{ $page }}";
    const selectedInput = document.getElementById('selected_words');

    // On load: load previous selections from localStorage
    window.onload = () => {
        const previous = JSON.parse(localStorage.getItem(localKey)) || [];

        selected = previous;
        selected.forEach(val => {
            const cb = document.querySelector(`input[type=checkbox][value="${val}"]`);
            if (cb) cb.checked = true;
        });

        selectedInput.value = JSON.stringify(selected);
    };

    function handleCheck(box) {
        const val = box.value;

        if (box.checked) {
            if (selected.length < 5) {
                selected.push(val);
            } else {
                alert("Only 5 words allowed!");
                box.checked = false;
            }
        } else {
            selected = selected.filter(v => v !== val);
        }

        selectedInput.value = JSON.stringify(selected);
        localStorage.setItem(localKey, JSON.stringify(selected)); // 👈 Save to localStorage
    }
</script> --}}
{{-- <style>
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
</style> --}}

<main id="main" class="main">

  

  <div class="pagetitle">
    <h1>Values Assessment</h1>
  </div>

  <section class="section">
    <div class="container">
      <h2>Page {{ $page }}: Select 5 Words</h2>

      <form method="POST" action="{{ url('candidate/value/assessment/' . $page) }}">
          @csrf
          <div id="words-container">
              @foreach ($words as $word)
                  <div class="word-box" onclick="toggleSelect(this)" data-word="{{ $word }}">
                      {{ $word }}
                  </div>
              @endforeach
          </div>
  
          <input type="hidden" name="selected_words" id="selected_words">
          <div style="margin-top: 30px;">
              @if ($page > 1)
                  <a href="{{ url( 'candidate/value/assessment/'. $page - 1  )}}">
                      <button type="button">Previous</button>
                  </a>
              @endif
              <button type="submit">Next</button>
          </div>
      </form>
  
      @if ($errors->any())
          <div style="color:red;">
              @foreach ($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
          </div>
      @endif
  
    </div>
  </section>

</main>

<script>
  let selected = [];
  const localKey = "quiz_page_{{ $page }}";
  const selectedInput = document.getElementById("selected_words");

  window.onload = () => {
      const prev = JSON.parse(localStorage.getItem(localKey)) || [];
      selected = prev;
      selectedInput.value = JSON.stringify(selected);

      document.querySelectorAll(".word-box").forEach(box => {
          const word = box.dataset.word;
          const index = selected.indexOf(word);
          if (index !== -1) {
              box.classList.add("selected");
              addRankLabel(box, index + 1);
          }
      });
  };

  function toggleSelect(box) {
      const word = box.dataset.word;
      const index = selected.indexOf(word);

      if (index !== -1) {
          selected.splice(index, 1);
          box.classList.remove("selected");
          removeRankLabel(box);
      } else {
          if (selected.length >= 5) {
              alert("You can only select 5 words.");
              return;
          }
          selected.push(word);
          box.classList.add("selected");
          addRankLabel(box, selected.length);
      }

      updateAllRanks();
      selectedInput.value = JSON.stringify(selected);
      localStorage.setItem(localKey, JSON.stringify(selected));
  }

  function addRankLabel(box, rank) {
      removeRankLabel(box);
      const label = document.createElement("div");
      label.classList.add("rank");
      label.innerText = rank;
      box.appendChild(label);
  }

  function removeRankLabel(box) {
      const existing = box.querySelector(".rank");
      if (existing) existing.remove();
  }

  function updateAllRanks() {
      document.querySelectorAll(".word-box").forEach(box => {
          removeRankLabel(box);
      });
      selected.forEach((word, i) => {
          const box = document.querySelector(`.word-box[data-word="${word}"]`);
          if (box) addRankLabel(box, i + 1);
      });
  }
</script>

<style>
  .word-box {
      display: inline-block;
      width: 150px;
      height: 80px;
      line-height: 80px;
      text-align: center;
      border: 2px solid #ccc;
      border-radius: 8px;
      margin: 10px;
      font-size: 16px;
      cursor: pointer;
      position: relative;
  }

  .word-box.selected {
      background-color: #e0f7fa;
      border-color: #00796b;
  }

  .rank {
      position: absolute;
      top: 5px;
      right: 10px;
      font-weight: bold;
      color: #00796b;
  }
</style>

@endsection