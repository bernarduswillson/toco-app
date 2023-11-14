<?php
?>

<div class="merch">
    <div class="container merch-container">
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            Merchandise
        </h1>
        <div>
            <?= $data['gems'] ?>
        </div>
        <div>
            <? foreach ($data['merch'] as $merch): ?>
                <div>
                    <div>
                        <!-- <img src="http://express:5000/image/?filename=<?= $merch['image'] ?>" alt=""> -->
                        <img src="http://192.168.0.11:5000/image/?filename=<?= $merch['image'] ?>" alt="">
                    </div>
                    <div>
                        <?= $merch['name'] ?>
                    </div>
                    <div>
                        <?= $merch['price'] ?>
                    </div>
                    <div>
                        <?= $merch['desc'] ?>
                    </div>
                    <div>
                        <form action="../../../api/merch/buy.php" method="post">
                            <input type="hidden" name="merchId" value="<?= $merch['merchandise_id'] ?>">
                            <input type="hidden" name="userId" value="<?= $data['user_id'] ?>">
                            <button type="submit" name="buyMerch">Buy</button>
                        </form>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>