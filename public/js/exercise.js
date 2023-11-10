const exerciseContainer = document.getElementById('exercise-container');
const languageSelect = document.getElementById('language-input');
languageSelect.addEventListener('change', fetchExercises);

fetchExercises();

function fetchExercises() {
  const selectedLanguageId = parseInt(languageSelect.value, 10);

  if (selectedLanguageId === -1) {
    link = "http://localhost:5000/exercise"
  } else {
    link = `http://localhost:5000/exercise/${selectedLanguageId}`
  }

  fetch(link)
    .then(response => response.json())
    .then(data => {
      const exerciseContainer = document.getElementById('exercise-container');

      exerciseContainer.innerHTML = '';

      data.result.forEach(exercise => {
        const exerciseCard = document.createElement('div');
        exerciseCard.classList.add('exercise-card');

        for (let i = 0; i < languages.length; i++) {
          if (languages[i].language_id === exercise.language_id) {
            language = languages[i].language_name;
            break;
          }
        }

        exerciseCard.innerHTML = `
          <a href="/exercise/question/${exercise.exercise_id}">
            <div class="exercise-head">
              <div class="content">
                <h2 class="font-bold text-md">${exercise.exe_name}</h2>
                <span class="font-reg text-xs">${language} &#9679; ${exercise.difficulty} &#9679; ${exercise.category}</span>
              </div>
            </div>
          </a>
        `;

        exerciseContainer.appendChild(exerciseCard);
      });
    })
    .catch(error => {
      console.error('Error:', error);
    });
}
