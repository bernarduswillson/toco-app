<?php
?>

<div class="manage">
  <div class="admin-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      <?= $data["language"]["language_name"] ?> Modules
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
        <a href="/admin/dashboard" class="text-orange font-reg text-sm">
          Dashboard
        </a>
        <span class="text-orange font-reg text-sm">&gt;</span>
        <a href="/admin/manage" class="text-orange font-reg text-sm">
          Manage
        </a>
        <span class="text-orange font-reg text-sm">&gt;</span>
        <a href="/admin/manage/ <?= $data["language"]["language_name"] ?>" class="text-orange font-reg text-sm">
          <?= $data["language"]["language_name"] ?>
        </a>
      </div>

      <a href="/admin/create/<?= $data["language"]["language_name"] ?>">
        <div class="admin-card add-card">
          <span class="text-md font-bold">
            + Add new Module
          </span>
        </div>
      </a>
      <?php foreach( $data["modules"] as $module ): ?>
      <div class="admin-card">
        <span class="font-bold text-md"><?= $module["category"] . " - " . $module["module_name"] ?></span>
        <div class="button-container">
          <a href="/learn/<?= $data["language"]["language_name"] . "/" . $module["module_name"] ?>" class="secondary-card-button">
            Page
          </a>
          <a href="/admin/manage/<?= $data["language"]["language_name"] . "/" . $module["module_name"] ?>" class="primary-card-button">
            Videos
          </a>
          <a href="" class="primary-card-button">
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

