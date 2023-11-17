<div class="conf">
    <div class="container conf-container">
        <? if ($data['isSuccess'] == 1): ?>
            <h1 class="font-bold text-xl text-blue-purple-gradient">
                Purchase Successful!
            </h1>
        <? else: ?>
            <h1 class="font-bold text-xl text-red">
                Purchase Failed!
            </h1>
        <? endif; ?>
        <div class="conf-items">
            <div class="merch-item"
                style="background-image: url('http://localhost:5000/image/?filename=<?= $data['merch']['image'] ?>&apiKey=ax5kBNUxP2Cr0l8dwR472lMOiPeyJLRY7mKbTw0Cc8Z3hVW2kYmtAFcTNctI9139hHWUbJ5q3U8mRlZopXhFd9sTleg4lPr0DQkeMg3ntQZZFaTrASrWbc5QZ4CDIlPO');">
                <div class="merch-image"></div>
                <div class="merch-details">
                    <div class="merch-name">
                        <?= $data['merch']['name'] ?>
                    </div>
                    <div class="merch-desc">
                        <?= $data['merch']['desc'] ?>
                    </div>
                    <? if ($data['isSuccess'] == 1): ?>
                        <div class="merch-price">
                            -
                            <?= $data['merch']['price'] ?> Gems
                        </div>
                    <? endif; ?>
                    <? if ($data['isSuccess'] == 0): ?>
                        <div class="merch-price">
                            Insufficient Gems
                        </div>
                    <? endif; ?>
                    " <button class="buy-button" name="backMerch" onclick=goBack()>Back</button>
                    "
                </div>
            </div>
        </div>
        <div class="font-bold">
            Your total gems:
            <span class="result-text">
                <?= $data['gems'] ?>
            </span>
        </div>
    </div>
</div>
<script>
    function goBack() {
        window.location.href = 'http://localhost:8008/merchandise';
    }
</script>