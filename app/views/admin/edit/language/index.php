<?php
$language_pic = $data["language"]["language_flag"];
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">

    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Edit
      <?= $data["language"]["language_name"] ?>
    </h1>

    <form action="../../../../../api/admin/editLanguage.php" method="post">
      <!-- Modal -->
      <div class="confirm-container close-modal-trigger">
          <div class="confirm-card">
              <div class="confirm-content">
                  <h2 class="text-md text-red font-reg">Delete "<?= $data["language"]["language_name"] ?>"?</h2>
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

      <input type="hidden" id="language-id" name="language-id" value="<?= $data["language"]["language_id"] ?>">
      <div class="language-picture-container">
        <img id="language-image" class="language-image" src="<?php echo $language_pic; ?>" alt="Language flag image"
          draggable="false" height="150px" width="150px">
        <input type="hidden" id="new-language-pic" name="new-language-pic" value="<?php echo $language_pic; ?>">

        <div class="button-container">
          <input type="file" id="upload-input" accept="image/*">
          <label for="upload-input" class="primary-blue-button font-reg text-sm">Change picture</label>
          <button class="font-reg text-sm secondary-blue-button" id="delete-btn">Delete picture</button>
        </div>
      </div>

      <div class="text-input-container">
        <label for="languageName" class="text-reg text-black text-xs">Language name</label>
        <input id="language-input" type="text" name="languageName" placeholder="Language name"
          class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["language"]["language_name"] ?>" required>
          <p id="language-error"></p>
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage" class="secondary-orange-button font-reg text-sm">Back</a>
        <button type="button" class="primary-red-button font-reg text-sm modal-trigger">Delete</button>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm" onchange="checkLanguage()">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
    const initialLanguage = "<?= $data["language"]["language_name"] ?>";
</script>
<script src="/public/js/edit-language.js"></script>
<script src="/public/js/modal.js"></script>