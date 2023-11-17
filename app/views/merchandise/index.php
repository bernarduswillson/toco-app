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
                    style="background-image: url('http://localhost:5000/image/?filename=<?= $merch['image'] ?>&apiKey=ax5kBNUxP2Cr0l8dwR472lMOiPeyJLRY7mKbTw0Cc8Z3hVW2kYmtAFcTNctI9139hHWUbJ5q3U8mRlZopXhFd9sTleg4lPr0DQkeMg3ntQZZFaTrASrWbc5QZ4CDIlPO');">
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
                                <!-- Modal -->
                                <div class="confirm-container close-modal-trigger">
                                    <div class="confirm-card">
                                        <div class="confirm-content">
                                            <h2 class="text-md text-red font-reg">Are you sure?</h2>
                                            <p class="text-sm text-black font-reg">Please re-check your purchase before buying</p>
                                        </div>
                                        <div class="modal-button-container">
                                            <button type="button"
                                                class="secondary-btn font-reg text-sm close-modal-trigger" data-index="0">
                                                Cancel
                                            </button>
                                            <button class="primary-btn font-reg text-sm" id="logout-btn" name="buyMerch"
                                                type="submit">
                                                Buy
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="merchId" value="<?= $merch['merchandise_id'] ?>">
                                <input type="hidden" name="userId" value="<?= $data['user_id'] ?>">
                                <input type="hidden" name="email" value="<?= $data['email'] ?>">
                                <button class="buy-button modal-trigger" type="button" name="buyMerch">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
<script src="../../../public/js/modalIter.js"></script>