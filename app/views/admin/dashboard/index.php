<?php
?>

<div class="dashboard">
  <div class="admin-container admin-list-content-container">
    <h1 class="text-blue-purple-gradient font-bold text-xl">
      Hello Admin
    </h1>

    <div class="list-container">
      <div class="breadcrumb">
        <a href="/admin/dashboard" class="text-orange font-reg text-sm breadcrumb">
          Dashboard
        </a>
      </div>

      <div class="entity-card">
        <span class="font-bold text-md">Language</span>
        <span class="font-reg text-sm"><?= $data["languageCount"] ?> Records</span>
      </div>
      <div class="entity-card">
        <span class="font-bold text-md">Modules</span>
        <span class="font-reg text-sm"><?= $data["moduleCount"] ?> Records</span>
      </div>
      <div class="entity-card">
        <span class="font-bold text-md">Videos</span>
        <span class="font-reg text-sm"><?= $data["videoCount"] ?> Records</span>
      </div>
      <div class="entity-card">
        <span class="font-bold text-md">Users</span>
        <span class="font-reg text-sm"><?= $data["userCount"] ?> Records</span>
      </div>
    </div>

    <a class="primary-button text-sm font-reg" href="/admin/manage">
      Manage
    </a>
  </div>
</div>