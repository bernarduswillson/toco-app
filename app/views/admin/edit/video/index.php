<?php
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Edit <?= $data["video"]["video_name"] ?>
    </h1>

    <form action="../../../../../api/admin/editVideo.php" method="post">
      <input type="hidden" name="module_id" value="<?= $data['video']['module_id'] ?>">
      <input type="hidden" name="video_id" value="<?= $data["video"]["video_id"] ?>">
      <input type="hidden" name="video_order" value="<?= $data["video"]["video_order"] ?>">
      <input type="hidden" name="language_id" value="<?= $data["languageId"] ?>">
      <div class="text-input-container">
        <label for="videoName" class="text-reg text-black text-xs">Video name</label>
        <input id="name-input" type="text" name="videoName" placeholder="Video name" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["video"]["video_name"] ?>">
        <label for="description" class="text-reg text-black text-xs">Description</label>
        <input id="desc-input" type="text" name="description" placeholder="Description" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["video"]["video_desc"] ?>">
        <label for="videoUrl" class="text-reg text-black text-xs">URL</label>
        <input id="url-input" type="text" name="videoUrl" placeholder="Video URL" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["video"]["video_url"] ?>">
        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["video"]["video_order"] ?>">
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["languageId"] . "/" . $data['video']['module_id'] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button type="submit" class="primary-red-button font-reg text-sm" name="delete">Delete</button>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm">Save</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-video.js"></script>