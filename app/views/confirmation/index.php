<div class="conf">
    <div class="container conf-container">
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            <?= $data['isSuccess'] ?>
        </h1>
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            <?= $data['gems'] ?>
        </h1>
        <img src="http://192.168.0.11:5000/image/?filename=<?= $data['merch']['image'] ?>" alt="merch-image" class="merch-image">
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            <?= $data['merch']['name'] ?>
        </h1>
        <h1 class="font-bold text-xl text-blue-purple-gradient">
            <?= $data['merch']['price'] ?>
        </h1>
    </div>
</div>