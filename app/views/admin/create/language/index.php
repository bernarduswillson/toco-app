<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Add New Language
    </h1>

    <form action="">
      <div class="language-picture-container">
        <img src="/public/icons/profile.webp" alt="Language flag image">

        <div class="button-container">
          <button class="font-reg text-sm primary-blue-button">Change picture</button>
          <button class="font-reg text-sm secondary-blue-button">Delete picture</button>
        </div>
      </div>

      <div class="text-input-container">
        <label for="languageName" class="text-reg text-black text-xs">Language name</label>
        <input id="language-input" type="text" name="languageName" placeholder="Language name" class="font-reg text-black text-sm" autocomplete="false">
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage" class="secondary-orange-button font-reg text-sm">Back</a>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm disable">Create</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-language.js"></script>