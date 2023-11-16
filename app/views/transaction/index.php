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
                <?= $transaction['action'] ?>
              </h2>
              <? if (explode(' ', $transaction['action'])[0] == 'Buy'): ?>
                <h3 class="font-bold amount-text-buy">
                  -
                  <?= $transaction['amount'] ?> Gems
                </h3>
              <? else: ?>
                <h3 class="font-bold amount-text-get">
                  +
                  <?= $transaction['amount'] ?> Gems
                </h3>
              <? endif; ?>
              <div class="font-reg datetime-text">
                Date: <?=(explode(' ', $transaction['created_at'])[0])?>
              </div>
              <div class="font-reg datetime-text">
                Time: <?=(explode(' ', $transaction['created_at'])[1])?>
              </div>
              <? if ($transaction['status'] == 'ACCEPTED'): ?>
                <h3 class="font-reg status-text-green">
                  <?= $transaction['status'] ?>
                </h3>
              <? else: ?>
                <h3 class="font-reg status-text-red">
                  <?= $transaction['status'] ?>
                </h3>
              <? endif; ?>
            </div>
            <span class="font-reg text-xs">
              <? if (explode(' ', $transaction['action'])[0] == 'Buy'): ?>
                <img src="/assets/images/gem.svg" alt="merch" class="merch-icon">
              <? else: ?>
                <img src="/assets/images/gem.svg" alt="gem" class="gem-icon">
              <? endif; ?>
            </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>