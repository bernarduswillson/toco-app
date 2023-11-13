fetchQuestions(0);

let selectedOption = {};

function fetchQuestions(page) {
  fetch(`http://localhost:5000/question/${exercise}`)
    .then(response => response.json())
    .then(question => {
      const questionContainer = document.getElementById('question-container');

      questionContainer.innerHTML = '';

      const questionList = document.createElement('div');
      questionList.classList.add('question-list');

      questionList.innerHTML = `
        <div class="question-head">
          <div class="content" id="content">
            <h2>${question.result[page].question}</h2>
          </div>
        </div>
      `;

      questionContainer.appendChild(questionList);

      fetch(`http://localhost:5000/option/${question.result[page].question_id}`)
        .then(response => response.json())
        .then(options => {
          const content = document.getElementById('content');
          const optionList = document.createElement('div');
          optionList.classList.add('option-list');

          options.result.forEach(option => {
            const optionItem = document.createElement('div');
            optionItem.innerHTML = `
              <label>
                <input 
                  type="radio" 
                  name="options" 
                  value="${option.option_id}" 
                  ${selectedOption[question.result[page].question_id.toString()] === option.option_id ? 'checked' : ''}
                  onclick="saveSelectedOption(${question.result[page].question_id}, ${option.option_id})"
                >
                ${option.option}
              </label>
            `;
            // console.log(option.option_id)

            optionList.appendChild(optionItem);
          });

          content.appendChild(optionList);
        });
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

const exercisePagination = document.getElementById('exercise-pagination');
fetch(`http://localhost:5000/question/count/${exercise}`)
  .then(response => response.json())
  .then(countData => {
    const totalQuestions = countData.result;
    const totalPages = totalQuestions;

    console.log('Total Questions:', totalQuestions);

    for (let page = 1; page <= totalPages; page++) {
      const paginationCard = document.createElement('div');
      paginationCard.classList.add('pagination-card');

      paginationCard.innerHTML = `
        <button class="pagination-button" onclick="fetchQuestions(${page - 1})">
          ${page}
        </button>
      `;

      exercisePagination.appendChild(paginationCard);
    }
  })
  .catch(error => {
    console.error('Error:', error);
  });

function saveSelectedOption(questionId, optionId) {
  const questionKey = questionId.toString();
  selectedOption[questionKey] = optionId;
}

function submitQuiz() {
  const exerciseId = exercise;

  const submitData = {};

  for (const questionId in selectedOption) {
    if (selectedOption.hasOwnProperty(questionId)) {
      const optionId = selectedOption[questionId];
      submitData[`question_${questionId}`] = optionId;
    }
  }

  fetch(`http://localhost:5000/exercise/result/${exerciseId}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(submitData),
  })
    .then(response => response.json())
    .then(data => {
      console.log('Quiz submitted successfully:', data);
      const exerciseScore = document.getElementById('exercise-score');

      const correct = Object.keys(data.correctResults);
      const wrong = Object.keys(data.wrongResults);
      const correctLength = correct.length;
      const wrongLength = wrong.length;
      const score = correctLength / (correctLength + wrongLength) * 100

      exerciseScore.innerHTML = '';

      exerciseScore.innerHTML = `
        ${score}
      `;
    })
    .catch(error => {
      console.error('Error submitting quiz:', error);
    });
}
