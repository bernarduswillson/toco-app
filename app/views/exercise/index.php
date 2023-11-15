<?php
$selectedLanguageId = isset($_GET['language']) ? (int) $_GET['language'] : -1;
?>

<div class="exercise">
  <div class="container exercise-container">
    <h1 class="font-bold text-xl text-blue-purple-gradient">
      Exercise
    </h1>

    <form id="search-filter-sort-form" action="" method="GET">
      <div class="input-container">
        <div class="filter-sort">
          <select name="language" id="language-input" class="text-sm font-reg text-black">
            <option value="-1" <?php echo ($selectedLanguageId === -1) ? "selected" : ""; ?>>All languages</option>
            <?php foreach ($data["languages"] as $language): ?>
              <option value="<?= $language["language_id"] ?>" <?php echo ($selectedLanguageId == $language["language_id"]) ? "selected" : ""; ?>>
                <?= $language["language_name"] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="card-container" id="exercise-container">
        <?php foreach ($data['exercise'] as $exercise): ?>
          <div class="exercise-card">
            <?php
            $isProgressExists = false;
            foreach ($data["progress"] as $progress) {
              if ($progress["exercise_id"] == $exercise['exercise_id']) {
                $isProgressExists = true;
                break;
              }
            }
            ?>
            <?php if (!$isProgressExists): ?>
              <a href="/exercise/question/<?= $exercise['exercise_id'] ?>">
              <?php endif; ?>
              <div class="exercise-head">
                <div class="content">
                  <h2 class="font-bold text-md">
                    <?= $exercise['exe_name'] ?>
                  </h2>
                  <?php
                  $selectedLanguage = null;
                  foreach ($data["languages"] as $language) {
                    if ($language["language_id"] == $exercise["language_id"]) {
                      $selectedLanguage = $language;
                      break;
                    }
                  }
                  ?>
                  <span class="font-reg text-xs">
                    <?= $selectedLanguage["language_name"] ?> &#9679;
                    <?= $exercise['difficulty'] ?> &#9679;
                    <?= $exercise['category'] ?>
                  </span>
                </div>

                <?php foreach ($data["progress"] as $progress): ?>
                  <?php if ($progress["exercise_id"] == $exercise['exercise_id']): ?>
                    <div class="score font-bold text-md text-orange">
                      <?= $progress['score'] ?>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <?php if (!$isProgressExists): ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </form>
  </div>
</div>
<script>
  const languages = <?= json_encode($data["languages"]) ?>;
</script>