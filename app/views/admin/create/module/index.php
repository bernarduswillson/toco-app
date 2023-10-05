<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Add New Module
    </h1>

    <form action="../../../../../api/admin/module.php" method="post">
      <input type="hidden" name="language_id" value="<?= $data["languageId"] ?>">
      <div class="text-input-container">
        <label for="moduleName" class="text-reg text-black text-xs">Module name</label>
        <input id="module-input" type="text" name="moduleName" placeholder="Module name" class="font-reg text-black text-sm" autocomplete="false" required>
        <p id="module-error"></p>
        <label for="category" class="text-reg text-black text-xs">Category</label>
        <input id="category-input" type="text" name="category" placeholder="Category" class="font-reg text-black text-sm" autocomplete="false" required>
        <p id="category-error"></p>
        <label for="difficulty" class="text-reg text-black text-xs">Difficulty</label>
        <select name="difficulty" class="font-reg text-black text-sm">
          <option value="Beginner" selected>Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Advanced">Advanced</option>
        </select>
        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false" required>
        <p id="order-error"></p>
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["languageId"] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm disable" onchange="checkModule(), checkCategory(), checkOrder()" disabled>Create</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-module.js"></script>