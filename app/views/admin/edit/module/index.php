<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Edit <?= $data["module"]["module_name"] ?>
    </h1>

    <form action="../../../../../api/admin/editModule.php" method="post">
      <input type="hidden" name="language_id" value="<?= $data["module"]["language_id"] ?>">
      <input type="hidden" name="module_id" value="<?= $data["module"]["module_id"] ?>">
      <input type="hidden" name="module_order" value="<?= $data["module"]["module_order"] ?>">
      <div class="text-input-container">
        <label for="moduleName" class="text-reg text-black text-xs">Module name</label>
        <input id="module-input" type="text" name="moduleName" placeholder="Module name" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["module_name"] ?>" required>
        <p id="module-error"></p>
        <label for="category" class="text-reg text-black text-xs">Category</label>
        <input id="category-input" type="text" name="category" placeholder="Category" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["category"] ?>" required>
        <p id="category-error"></p>
        <!-- Ini belum di setup -->
        <label for="difficulty" class="text-reg text-black text-xs">Difficulty</label>
        <select name="difficulty" class="font-reg text-black text-sm">
          <option value="Beginner" selected>Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Advanced">Advanced</option>
        </select>
        <!--  -->
        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["module_order"] ?>" required>
        <p id="order-error"></p>
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["module"]["language_id"] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button type="submit" class="primary-red-button font-reg text-sm" name="delete">Delete</button>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm" onchange="checkModule(), checkCategory(), checkOrder()" disabled>Save</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-module.js"></script>