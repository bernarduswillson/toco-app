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
                style="background-image: url('http://172.20.10.2:5000/image/?filename=<?= $data['merch']['image'] ?>');">
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