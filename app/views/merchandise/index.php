<div class="merch">
    <div class="container merch-container">
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            Merchandise
        </h1>
        <div class="merch-header">
            <div class="gems">
                <img src="/public/icons/gems.svg" alt="gem" width="50px" class="gem-icon">
                <div>
                    <div class="font-reg">
                        Your Balance:
                    </div>
                    <div class="font-bold">
                        <?= $data['gems'] ?> gems
                    </div>
                </div>
            </div>
            <div class="redeem">
                <div class="font-bold">
                    Reedem Voucher
                </div>
                <form action="../../../api/merch/redeem.php" method="post">
                    <div>
                        <input type="hidden" name="userId" value="<?= $data['user_id'] ?>">
                        <input type="text" name="voucher" placeholder="Enter Voucher Code" class="redeem-input">
                        <button class="redeem-button distinct-button" type="submit" name="redeemVoucher">Redeem</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="merchandise-items">
            <? foreach ($data['merch'] as $merch): ?>
                <div class="merch-item"
                    style="background-image: url('http://192.168.0.11:5000/image/?filename=<?= $merch['image'] ?>');">
                    <div class="merch-image"></div>
                    <div class="merch-details">
                        <div class="merch-name">
                            <?= $merch['name'] ?>
                        </div>
                        <div class="merch-desc">
                            <?= $merch['desc'] ?>
                        </div>
                        <div class="merch-price">
                            <?= $merch['price'] ?> Gems
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