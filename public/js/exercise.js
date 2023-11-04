fetch('http://localhost:5000/exercise')
  .then(response => response.json())
  .then(data => {
    const exerciseContainer = document.getElementById('exercise-container');

    // Process the data and update the HTML content
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
        <div class="exercise-head">
          <div class="content">
            <h2 class="font-bold text-md">${exercise.exe_name}</h2>
            <span class="font-reg text-xs">${language} &#9679; ${exercise.difficulty} &#9679; ${exercise.category}</span>
          </div>
        </div>
      `;

      exerciseContainer.appendChild(exerciseCard);
    });
  })
  .catch(error => {
    console.error('Error:', error);
  });
