<?php
$selectedLanguageId = isset($_GET['language']) ? (int) $_GET['language'] : -1;
?>

<div class="exercise">
  <div class="container exercise-container">
    <h1 class="font-bold text-xl text-blue-purple-gradient">
      Exercise
    </h1>

      <div class="card-container" id="exercise-container">
        <?php foreach ($data['exercise'] as $exercise): ?>
          <div class="exercise-card">
            <a href="/exercise/question/<?= $exercise['exercise_id'] ?>">
              <div class="exercise-head">
                <div class="content">
                  <h2 class="font-bold text-md">
                    <?php
                    $imageUrl = null;
                    foreach ($data["languages"] as $language) {
                      if ($language["language_id"] == $exercise["language_id"]) {
                        $imageUrl = $language["language_flag"];
                        break;
                      }
                    }
                    ?>
                    <img src="<?= $imageUrl ?>" alt="language" width="20px" height="20px" class="language-icon">
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
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </form>
  </div>
</div>
<script>
  const languages = <?= json_encode($data["languages"]) ?>;
</script>