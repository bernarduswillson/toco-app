<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Edit <?= $data["module"]["module_name"] ?>
    </h1>

    <form action="../../../../../api/admin/editModule.php" method="post">
      <!-- Modal -->
      <div class="confirm-container close-modal-trigger">
          <div class="confirm-card">
              <div class="confirm-content">
                  <h2 class="text-md text-red font-reg">Delete "<?= $data["module"]["module_name"] ?>"?</h2>
                  <p class="text-sm text-black font-reg">This action cannot be undone. All associated data will be permanently removed.</p>
              </div>
              <div class="modal-button-container">
                  <button type="button" class="secondary-btn font-reg text-sm close-modal-trigger">
                      Cancel
                  </button>   
                  <button class="primary-btn font-reg text-sm" id="logout-btn" name="delete" type="submit">
                      Delete
                  </button>   
              </div>
          </div>  
      </div>
      <!--  -->
      <input type="hidden" name="language_id" id="language_id" value="<?= $data["module"]["language_id"] ?>">
      <input type="hidden" name="module_id" value="<?= $data["module"]["module_id"] ?>">
      <input type="hidden" name="module_order" value="<?= $data["module"]["module_order"] ?>">
      <div class="text-input-container">
        <label for="moduleName" class="text-reg text-black text-xs">Module name</label>
        <input id="module-input" type="text" name="moduleName" placeholder="Module name" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["module_name"] ?>" required>
        <p id="module-error"></p>
        <label for="category" class="text-reg text-black text-xs">Category</label>
        <input id="category-input" type="text" name="category" placeholder="Category" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["category"] ?>" required>
        <p id="category-error"></p>
        <label for="difficulty" class="text-reg text-black text-xs">Difficulty</label>
        <select name="difficulty" class="font-reg text-black text-sm">
          <option value="Beginner" selected>Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Advanced">Advanced</option>
        </select>
        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["module"]["module_order"] ?>" required>
        <p id="order-error"></p>
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["module"]["language_id"] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button type="button" class="primary-red-button font-reg text-sm modal-trigger">Delete</button>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm" onchange="checkModule(), checkCategory(), checkOrder()">Save</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/edit-module.js"></script>
<script src="/public/js/modal.js"></script>