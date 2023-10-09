<?php
$video = '/public/video/default.mp4';
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Add New Video
    </h1>

    <form action="../../../../../api/admin/video.php" method="post">
      <input type="hidden" name="moduleId" id="module_id" value="<?= $data["moduleId"] ?>">
      <input type="hidden" name="languageId" value="<?= $data["languageId"] ?>">
      <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
      <div class="text-input-container">
        <label for="videoName" class="text-reg text-black text-xs">Video name</label>
        <input id="name-input" type="text" name="videoName" placeholder="Video name" class="font-reg text-black text-sm"
          autocomplete="false" required>
        <p id="video-error"></p>
        <label for="description" class="text-reg text-black text-xs">Description</label>
        <input id="desc-input" type="text" name="description" placeholder="Description"
          class="font-reg text-black text-sm" autocomplete="false">

        <label for="videoUrl" class="text-reg text-black text-xs">File</label>
        <input type="hidden" id="new-video" name="new-video" value="<?php echo $video; ?>">
        <div class="language-picture-container">
          <p id="video-path">default.mp4</p>
          <input type="hidden" id="new-language-pic" name="new-language-pic" value="<?php echo $video; ?>">
          <div class="button-container">
            <input type="file" id="upload-input" accept="video/*">
            <label for="upload-input" class="primary-blue-button font-reg text-sm">Change video</label>
            <button class="font-reg text-sm secondary-blue-button" id="delete-btn">Delete video</button>
          </div>
        </div>

        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Video order" class="font-reg text-black text-sm"
          autocomplete="false" required>
        <p id="order-error-v"></p>
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["languageId"] . "/" . $data["moduleId"] ?>"
          class="secondary-orange-button font-reg text-sm">Back</a>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm disable"
          onchange="checkVideo(), checkOrder()" disabled>Create</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/create-video.js"></script>