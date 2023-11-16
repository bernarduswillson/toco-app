<div class="merch">
    <div class="container merch-container">
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            Merchandise
        </h1>
        <h2 class="gems font-bold">
            Your Balance: <?= $data['gems'] ?> gems
        </h2>
        <div class="merchandise-items">
            <? foreach ($data['merch'] as $merch): ?>
                <div class="merch-item" style="background-image: url('http://192.168.0.11:5000/image/?filename=<?= $merch['image'] ?>');">
                    <div class="merch-image"></div>
                    <div class="merch-details">
                        <div class="merch-name">
                            <?= $merch['name'] ?>
                        </div>
                        <div class="merch-desc">
                            <?= $merch['desc'] ?>
                        </div>
                        <div class="merch-price">
                            <?= $merch['price'] ?>
                        </div>
                        <div>
                            <form action="../../../api/merch/buy.php" method="post">
                                <input type="hidden" name="merchId" value="<?= $merch['merchandise_id'] ?>">
                                <input type="hidden" name="userId" value="<?= $data['user_id'] ?>">
                                <input type="hidden" name="email" value="<?= $data['email'] ?>">
                                <button class="buy-button" type="submit" name="buyMerch">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
