<div class="result">
    <div class="container result-container">
        <h1 class="font-bold text-xl text-blue-purple-gradient result-text">
            Your Score: <?= $data['score'] ?>
        </h1>
        <? if ($data['isDone'] == "") : ?>
            <div class="font-bold text-xl text-blue-purple-gradient result-text">
                Gems earned: +<?= $data['score'] ?>
            </div>
            <div class="font-bold text-xl text-blue-purple-gradient result-text">
                Your total gems: <?= $data['gems'] ?>
            </div>
        <? endif; ?>
        <div class="button-container">
            <a href="/exercise" class="distinct-button submit-button">Back to Exercise</a>
        </div>
    </div>
</div>