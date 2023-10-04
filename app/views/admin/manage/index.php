<?php
?>

<div class="manage">
  <div class="admin-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Languages
    </h1>

    <div class="search-bar">
      <form action="" method="GET">
        <input type="text" placeholder="Search languages" class="text-sm text-black font-reg">
        <button type="submit">
          <img id="search-icon" src="/public/icons/search-icon.svg" alt="Search icon">
        </button>
      </form>
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
      </div>

      <a href="/admin/create">
        <div class="admin-card add-card">
          <span class="text-md font-bold">
            + Add new Language
          </span>
        </div>
      </a>
      <?php foreach( $data["languages"] as $language ): ?>
      <div class="admin-card">
        <span class="font-bold text-md"><?= $language["language_name"] ?></span>
        <div class="button-container">
          <a href="/learn/lesson/<?= $language["language_id"] ?>" class="secondary-card-button">
            Page
          </a>
          <a href="/admin/manage/<?= $language["language_id"] ?>" class="primary-card-button">
            Modules
          </a>
          <a href="/admin/edit/<?= $language["language_id"]?>" class="primary-card-button">
            Edit
          </a>
        </div>
      </div>
      <?php endforeach ?>
    </div>

    <div class="pagination-container">
      <a class="text-sm" href="">&lt;</a>
      <a class="text-sm active" href="">1</a>
      <a class="text-sm" href="">2</a>
      <a class="text-sm" href="">...</a>
      <a class="text-sm" href="">5</a>
      <a class="text-sm" href="">&gt;</a>
    </div>
  </div>
</div>

