<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/learn.css">
    <link rel="stylesheet" href="../../../public/css/global.css">
</head>
<body>
    <div class="learn">
        <div class="learn1">
            <h1 class="learn-header">
                I want to learn ...
            </h1>
            <div class="learn-container">
                <?php foreach ($data["languages"] as $language): ?>
                    <div class="learn-card" onclick="submitForm(<?= $language["language_id"] ?>)">
                        <form id="form_<?= $language["language_id"] ?>" action="../../../api/auth/progress.php" method="post">
                            <input type="hidden" name="language_id" value="<?= $language["language_id"] ?>">
                            <div>
                                <img class="learn-card-image" src="<?= $language["language_flag"] ?>" alt="<?= $language["language_name"] ?>" height="130px">
                                <h2 class="learn-card-header">
                                    <?= $language["language_name"] ?>
                                </h2>
                            </div>
                        </form>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <script>
        function submitForm(languageId) {
            const form = document.getElementById(`form_${languageId}`);
            form.submit();
        }
    </script>
</body>
</html>
