<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Add New Video
    </h1>

    <form action="">
      <div class="text-input-container">
        <label for="videoName" class="text-reg text-black text-xs">Video name</label>
        <input type="text" name="videoName" placeholder="Video name" class="font-reg text-black text-sm" autocomplete="false">
        <label for="description" class="text-reg text-black text-xs">Description</label>
        <input type="text" name="description" placeholder="Description" class="font-reg text-black text-sm" autocomplete="false">
        <label for="videoUrl" class="text-reg text-black text-xs">URL</label>
        <input type="text" name="videoUrl" placeholder="Video URL" class="font-reg text-black text-sm" autocomplete="false">
        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false">
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["languageName"] . "/" . $data["moduleName"] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button type="submit" class="primary-orange-button font-reg text-sm">Create</button>
      </div>
    </form>
  </div>
</div>