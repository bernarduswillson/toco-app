<?php
?>

<div class="transaction">
  <div class="container transaction-container">
    <h1 class="font-bold text-xl text-blue-purple-gradient">
      Transaction
    </h1>

    <div class="card-container" id="transaction-container">
      <?php foreach ($data['transaction'] as $transaction): ?>
        <div class="transaction-card">
          <div class="transaction-head">
            <div class="content">
              <h2 class="font-bold text-md">
                <?= $transaction['amount'] ?>
              </h2>
              <span class="font-reg text-xs">
                <?= $transaction['action'] ?> &#9679;
                <?= $transaction['status'] ?>
              </span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
  </div>
</div>