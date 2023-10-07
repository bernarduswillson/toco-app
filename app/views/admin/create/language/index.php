<?php
$language_pic = '/public/icons/profile.webp';
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Add New Language
    </h1>

    <form action="../../../../../api/admin/language.php" method="post">
      <div class="language-picture-container">
        <img id="language-image" class="language-image" src="<?php echo $language_pic; ?>" alt="Language flag image"
          draggable="false" height="150px" width="150px">
        <input type="hidden" id="new-language-pic" name="new-language-pic" value="<?php echo $language_pic; ?>">

        <div class="button-container">
          <button class="font-reg text-sm primary-blue-button">
            <input type="file" id="upload-input" name="upload-input" accept="image/*">
            Change picture
          </button>
          <button class="font-reg text-sm secondary-blue-button" id="delete-btn">Delete picture</button>
        </div>
      </div>

      <div class="text-input-container">
        <label for="languageName" class="text-reg text-black text-xs">Language name</label>
        <input id="language-input" type="text" name="languageName" placeholder="Language name"
          class="font-reg text-black text-sm" autocomplete="false" onchange="checkLanguage()" required>
        <p id="language-error"></p>
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage" class="secondary-orange-button font-reg text-sm">Back</a>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm disable" disabled>Create</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-language.js"></script>