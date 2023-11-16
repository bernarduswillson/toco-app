<div class="result">
    <div class="container result-container">
        <h1 class="text-xl result-header">
            Congratulations!<br>You have completed<br><span class="text-blue-purple-gradient">
                <?= $data['exe_name'] ?>
            </span>
        </h1>
        <div class="result-content">
            <h1 class="font-bold">
                Your Score: <?= $data['score'] ?>
            </h1>
            <? if ($data['isDone'] == ""): ?>
                <div class="font-bold">
                    Gems earned: <span class="result-text-green"> +
                    <?= $data['score'] ?> </span>
                </div>
                <div class="font-bold">
                    Your total gems:
                    <span class="result-text"> <?= $data['gems'] ?> </span>
                </div>
            <? endif; ?>
        </div>
        <div class="button-container">
            <a href="/exercise" class="distinct-button submit-button">Back to Exercise</a>
        </div>
    </div>
</div>