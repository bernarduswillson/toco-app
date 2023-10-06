<?php
?>

<div class="manage">
  <div class="admin-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      <?= $data["module"]["module_name"] ?> Videos
    </h1>

    <form action="" method="GET" id="search-filter-sort-form">
      <div id="search-box" class="search-bar">
        <input name="find" type="text" placeholder="Search videos" class="text-sm text-black font-reg" value="<?= $data["find"] ?>" autofocus>
        <button type="submit">
          <img id="search-icon" src="/public/icons/search-icon.svg" alt="Search icon">
        </button>
      </div>

      <div class="list-container">
        <div class="breadcrumb">
          <a href="/admin" class="text-orange font-reg text-sm">
            Dashboard
          </a>
          <span class="text-orange font-reg text-sm">&gt;</span>
          <a href="/admin/manage" class="text-orange font-reg text-sm">
            Manage
          </a>
          <span class="text-orange font-reg text-sm">&gt;</span>
          <a href="/admin/manage/<?= $data["language"]["language_id"] ?>" class="text-orange font-reg text-sm">
            <?= $data["language"]["language_name"] ?>
          </a>
          <span class="text-orange font-reg text-sm">&gt;</span>
          <a href="/admin/manage/<?= $data["language"]["language_id"] . "/" . $data["module"]["module_id"] ?>" class="text-orange font-reg text-sm">
            <?= $data["module"]["module_name"] ?>
          </a>
        </div>

        <a href="/admin/create/<?= $data["language"]["language_id"] . "/" . $data["module"]["module_id"] ?>">
          <div class="admin-card add-card">
            <span class="text-md font-bold">
              + Add new Video
            </span>
          </div>
        </a>
        <?php foreach( $data["videos"] as $video ): ?>
        <div class="admin-card">
          <span class="font-bold text-md"><?= $video["video_name"] ?></span>
          <div class="button-container">
            <a href="/learn/lesson/<?= $data["language"][1] . "/" . $data["module"]["module_id"] . "/" . $video["video_id"] ?>" class="secondary-card-button">
              Page
            </a>
            <a href="/admin/edit/<?= $data["language"]["language_id"] . "/" . $data["module"]["module_id"] . "/" . $video["video_id"] ?>" class="primary-card-button">
              Edit
            </a>
          </div>
        </div>
        <?php endforeach ?>
      </div>

      <div class="pagination-container">
        <input id="page-input" type="hidden" name="page" value="<?= intval($data["curr_page"]) ?>">
        <?php if (intval($data["curr_page"]) > 1): ?>
          <button onclick="prevPage()" class="text-sm">&lt;</button>
        <?php endif; ?>
        <button onclick="goToPage(1)" class="text-sm <?php echo $data["curr_page"] == 1 ? 'active' : '' ?>">1</button>
        <?php if (intval($data["curr_page"]) - 3 > 1): ?>
          <button disabled class="text-sm">...</button>
        <?php endif; ?>
        <?php for($i = 2; $i < $data["total_page"]; $i++): ?>
          <?php if ($i == 1 || $i == $data["total_page"] || $i == $data["curr_page"] || ($i <= $data["curr_page"] + 2 && $i >= $data["curr_page"] - 2)): ?>
            <button onclick="goToPage(<?= $i ?>)" class="text-sm <?php echo $data["curr_page"] == $i ? 'active' : '' ?>"><?= $i ?></button>
          <?php endif; ?>
        <?php endfor; ?>
        <?php if (intval($data["curr_page"]) + 3 < $data["total_page"]): ?>
          <button disabled class="text-sm">...</button>
        <?php endif; ?>
        <?php if ($data["curr_page"] != $data["total_page"]): ?>
          <button onclick="goToPage(<?= $data["total_page"] ?>)" class="text-sm <?php echo $data["curr_page"] == $data["total_page"] ? 'active' : '' ?>"><?= $data["total_page"] ?></button>
        <?php endif; ?>
        <?php if (intval($data["curr_page"]) < intval($data["total_page"])): ?>
          <button onclick="nextPage()" class="text-sm">&gt;</button>
        <?php endif; ?>
      </div>
    </form>
  </div>
</div>

<script src="/public/js/manage-search.js"></script>

