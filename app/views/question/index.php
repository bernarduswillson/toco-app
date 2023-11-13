<div class="question">
    <div class="container question-container">
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            <?= $data['currentExercise']['exe_name'] ?>
        </h1>
        <form method="post" action="../../../api/exercise/submit.php">
            <div class="" id="question-container">
                <div>
                    <?= $data['question']['question'] ?>
                </div>
                <?php foreach ($data["option"] as $option): ?>
                    <div>
                        <label>
                            <input type="radio" name="options" value="<?= $option['option_id'] ?>"
                                onclick="saveSelectedOption('<?= $data['question']['question_id'] ?>', '<?= $option['option_id'] ?>')">

                            <?= $option['option'] ?>
                        </label>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="" id="hidden"></div>
            <input type="hidden" name="exerciseId" value="<?= $data['currentExercise']['exercise_id'] ?>">
            <button type="submit" name="submitQuiz">Submit</button>
        </form>
        <div id="exercise-score"></div>
    </div>
</div>
<script>
    const selectedOption = {};

    function saveSelectedOption(questionId, optionId) {
        const questionKey = questionId.toString();
        selectedOption[questionKey] = optionId;
        // selectedOption[2] = 5

        let listString = Object.entries(selectedOption)
        .map(([key, value]) => `${key}:${value}`)
        .join(',');

        listString += listString ? '.' : '';

        const hidden = document.getElementById('hidden');

        hidden.innerHTML = '';

        hidden.innerHTML = `
            <input type="hidden" name="selectedOption" value="${listString}">
        `;
    }
</script>