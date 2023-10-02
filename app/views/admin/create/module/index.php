<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Add New Module
    </h1>

    <form action="">
      <div class="text-input-container">
        <label for="moduleName" class="text-reg text-black text-xs">Module name</label>
        <input id="module-input" type="text" name="moduleName" placeholder="Module name" class="font-reg text-black text-sm" autocomplete="false">
        <label for="category" class="text-reg text-black text-xs">Category</label>
        <input id="category-input" type="text" name="category" placeholder="Category" class="font-reg text-black text-sm" autocomplete="false">
        <label for="difficulty" class="text-reg text-black text-xs">Difficulty</label>
        <select name="difficulty" class="font-reg text-black text-sm">
          <option value="beginner" selected>Beginner</option>
          <option value="intermediate">Intermediate</option>
          <option value="advanced">Advanced</option>
        </select>
        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false">
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["languageId"] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm disable">Create</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-module.js"></script>