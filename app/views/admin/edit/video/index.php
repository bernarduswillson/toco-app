<?php
$video = $data["video"]["video_url"];
?>

<div class="create">
  <div class="admin-container input-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Edit <?= $data["video"]["video_name"] ?>
    </h1>

    <form action="../../../../../api/admin/editVideo.php" method="post">
      <!-- Modal -->
      <div class="confirm-container close-modal-trigger">
          <div class="confirm-card">
              <div class="confirm-content">
                  <h2 class="text-md text-red font-reg">Delete "<?= $data["video"]["video_name"] ?>"?</h2>
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
      <input type="hidden" name="module_id" id="module_id" value="<?= $data['video']['module_id'] ?>">
      <input type="hidden" name="video_id" value="<?= $data["video"]["video_id"] ?>">
      <input type="hidden" name="video_order" value="<?= $data["video"]["video_order"] ?>">
      <input type="hidden" name="language_id" value="<?= $data["languageId"] ?>">
      <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
      <div class="text-input-container">
        <label for="videoName" class="text-reg text-black text-xs">Video name</label>
        <input id="name-input" type="text" name="videoName" placeholder="Video name" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["video"]["video_name"] ?>">
        <p id="video-error"></p>
        <label for="description" class="text-reg text-black text-xs">Description</label>
        <input id="desc-input" type="text" name="description" placeholder="Description" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["video"]["video_desc"] ?>">
        <label for="videoUrl" class="text-reg text-black text-xs">URL</label>
        
        <input type="hidden" id="new-video" name="new-video" value="<?php echo $video; ?>">
        <div class="button-container">
          <button class="font-reg text-sm primary-blue-button">
            <input type="file" id="upload-input" accept="video/*">
            Change video
          </button>
          <button class="font-reg text-sm secondary-blue-button" id="delete-btn">Delete video</button>
        </div>

        <label for="order" class="text-reg text-black text-xs">Order</label>
        <input id="order-input" type="number" name="order" placeholder="Module order" class="font-reg text-black text-sm" autocomplete="false" value="<?= $data["video"]["video_order"] ?>">
        <p id="order-error"></p>
      </div>

      <div class="bottom-button-container">
        <a href="/admin/manage/<?= $data["languageId"] . "/" . $data['video']['module_id'] ?>" class="secondary-orange-button font-reg text-sm">Back</a>
        <button type="button" class="primary-red-button font-reg text-sm modal-trigger">Delete</button>
        <button id="create-btn" type="submit" class="primary-orange-button font-reg text-sm">Save</button>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/edit-video.js"></script>
<script src="/public/js/modal.js"></script>