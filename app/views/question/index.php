<?php
?>

<div class="question">
  <div class="container question-container">
    <h1 class="font-bold text-xl text-blue-purple-gradient" id="question-header">
    </h1>
    <div class="" id="question-container">
    </div>
    <div class="" id="exercise-pagination">
    </div>
    <button id="submitBtn" onclick="submitQuiz()">Submit</button>
    Score
    <div id="exercise-score">
    </div>
  </div>

    
</div>
<script>
  const exercise = <?= json_encode($data["exercise_id"]) ?>;
</script>
<script src="/public/js/question.js"></script>