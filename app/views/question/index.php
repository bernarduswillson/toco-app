<div class="question">
    <div class="container question-container">
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            <?= $data['currentExercise']['exe_name'] ?>
        </h1>
        <form method="post" action="../../../api/exercise/submit.php">
            <!-- Modal -->
            <div class="confirm-container close-modal-trigger">
                <div class="confirm-card">
                    <div class="confirm-content">
                        <h2 class="text-md text-red font-reg">Are you sure?</h2>
                        <p class="text-sm text-black font-reg">Please re-check your answers before submitting</p>
                    </div>
                    <div class="modal-button-container">
                        <button type="button" class="secondary-btn font-reg text-sm close-modal-trigger">
                            Cancel
                        </button>   
                        <button class="primary-btn font-reg text-sm" id="logout-btn" name="submitQuiz" type="submit">
                            Submit
                        </button>   
                    </div>
                </div>  
            </div>

            <div class="question-content">
                <?php $questionNumber = 1; ?>
                <?php foreach ($data["questions"] as $question): ?>
                    <div class="question-item">
                        <h2 class="question-header">
                            Question
                            <?= $questionNumber ?>
                        </h2>
                        <div class="question-text font-bold">
                            <?= $question['question'] ?>
                        </div>
                        <?php foreach ($question["options"] as $option): ?>
                            <div class="option">
                                <input type="radio" name="options[<?= $question['question_id'] ?>]"
                                    value="<?= $option['option_id'] ?>"
                                    id="option_<?= $question['question_id'] ?>_<?= $option['option_id'] ?>"
                                    onclick="saveSelectedOption('<?= $question['question_id'] ?>', '<?= $option['option_id'] ?>')">
                                <label for="option_<?= $question['question_id'] ?>_<?= $option['option_id'] ?>"
                                    class="option-label">
                                    <span class="radio-custom"></span>
                                    <?= $option['option'] ?>
                                </label>
                            </div>

                        <?php endforeach; ?>
                        <?php $questionNumber++; ?>
                    </div>
                <?php endforeach; ?>
                <div class="" id="hidden"></div>
                <input type="hidden" name="exerciseId" value="<?= $data['currentExercise']['exercise_id'] ?>">
                <input type="hidden" name="exerciseName" value="<?= $data['currentExercise']['exe_name'] ?>">
                <input type="hidden" name="userId" value="<?= $data["user_id"] ?>">
                <input type="hidden" name="isDone" value="<?= $data["isDone"] ?>">
                <div class="button-container">
        <button class="primary-button submit-button modal-trigger" type="button" name="submitQuiz">Submit</button>
    </div>
            </div>
        </form>
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

        const hidden = document.getElementById('hidden');

        hidden.innerHTML = '';

        hidden.innerHTML = `
            <input type="hidden" name="selectedOptions" value="${listString}">
        `;
    }
</script>
<script src="../../../public/js/modal.js"></script>