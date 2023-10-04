<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Add New Video
    </h1>

    <form action="../../../../../api/admin/addVideo.php" method="post">
      <input type="hidden" name="moduleId" value="<?= $data["moduleId"] ?>">
      <input type="hidden" name="languageId" value="<?= $data["languageId"] ?>">
      <div class="text-input-container">
        <label for="videoName" class="text-reg text-black text-xs">Video name</label>
        <input id="name-input" type="text" name="videoName" placeholder="Video name" class="font-reg text-black text-sm" autocomplete="false">
        <label for="description" class="text-reg text-black text-xs">Description</label>
        <input id="desc-input" type="text" name="description" placeholder="Description" class="font-reg text-black text-sm" autocomplete="false">
        <label for="videoUrl" class="text-reg text-black text-xs">URL</label>
        <input id="url-input" type="text" name="videoUrl" placeholder="Video URL" class="font-reg text-black text-sm" autocomplete="false">
        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false">
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["languageId"] . "/" . $data["moduleId"] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm disable">Create</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-video.js"></script>