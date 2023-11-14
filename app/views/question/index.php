<div class="question">
    <div class="container question-container">
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            <?= $data['currentExercise']['exe_name'] ?>
        </h1>
        <form method="post" action="../../../api/exercise/submit.php">
            <div class="" id="question-container">
                <?php foreach ($data["questions"] as $question): ?>
                    <div>
                        <?= $question['question'] ?>
                    </div>
                    <?php foreach ($question["options"] as $option): ?>
                        <div>
                            <label>
                                <input type="radio" name="options[<?= $question['question_id'] ?>]" value="<?= $option['option_id'] ?>"
                                    onclick="saveSelectedOption('<?= $question['question_id'] ?>', '<?= $option['option_id'] ?>')">
                                <?= $option['option'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <div class="" id="hidden"></div>
            <input type="hidden" name="exerciseId" value="<?= $data['currentExercise']['exercise_id'] ?>">
            <input type="hidden" name="userId" value="<?= $data["user_id"] ?>">
            <input type="hidden" name="isDone" value="<?= $data["isDone"] ?>">
            <button type="submit" name="submitQuiz">Submit</button>
        </form>
        <div id="exercise-score"></div>
    </div>
</div>

<script>
    const selectedOptions = {};

    function saveSelectedOption(questionId, optionId) {
        selectedOptions[questionId] = optionId;

        let listString = Object.entries(selectedOptions)
            .map(([key, value]) => `${key}:${value}`)
            .join(',');

        listString += listString ? '.' : '';

        console.log(listString);

        const hidden = document.getElementById('hidden');

        hidden.innerHTML = '';

        hidden.innerHTML = `
            <input type="hidden" name="selectedOptions" value="${listString}">
        `;
    }
</script>
