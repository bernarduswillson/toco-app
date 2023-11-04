<?php
?>

<div class="exercise">
  <div class="container exercise-container">
    <h1 class="font-bold text-xl text-blue-purple-gradient">
      Exercises
    </h1>

    <form id="search-filter-sort-form" action="" method="GET">
      <div class="input-container">
        <div class="filter-sort">
          <select name="language" id="language-input" class="text-sm font-reg text-black">
            <option value="" <?php echo empty($data["languages"]) ? "selected" : ""; ?>>All languages</option>
            <?php foreach ($data["languages"] as $language): ?>
              <option value="<?= $language["language_id"] ?>">
                <?= $language["language_name"] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="card-container" id="exercise-container">
      </div>
    </form>
  </div>
</div>
<script>
  const languages = <?= json_encode($data["languages"]) ?>;
</script>
<!-- <script src="/public/js/search-filter-sort.js"></script> -->
<script src="/public/js/exercise.js"></script>