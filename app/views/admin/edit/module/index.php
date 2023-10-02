<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Edit <?= $data["module"]["module_name"] ?>
    </h1>

    <form action="">
      <div class="text-input-container">
        <label for="moduleName" class="text-reg text-black text-xs">Module name</label>
        <input id="module-input" type="text" name="moduleName" placeholder="Module name" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["module_name"] ?>">
        <label for="category" class="text-reg text-black text-xs">Category</label>
        <input id="category-input" type="text" name="category" placeholder="Category" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["category"] ?>">
        <!-- Ini belum di setup -->
        <label for="difficulty" class="text-reg text-black text-xs">Difficulty</label>
        <select name="difficulty" class="font-reg text-black text-sm">
          <option value="beginner" selected>Beginner</option>
          <option value="intermediate">Intermediate</option>
          <option value="advanced">Advanced</option>
        </select>
        <!--  -->
        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["module_order"] ?>">
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["module"]["language_id"] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button type="submit" class="primary-red-button font-reg text-sm">Delete</button>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm">Save</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-module.js"></script>