<!DOCTYPE html>
<?php
$cookie_name = "user";
$cookie_value = "asw";
setcookie($cookie_name, $cookie_value, time() + 86400, "/");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat datang di Lab Software</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main/app.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo/favicon.png" type="image/png">
</head>

<body>

    <div class="text-center">
        <?php if (!isset($_COOKIE[$cookie_name])) { ?>
            <h1>Selamat datang di lab Software</h1>
            <div id="qrcode"></div>
        <?php } else { ?>
            <h1>Anda telah mengunjungi lab ini</h1>
        <?php } ?>
    </div>

    <script src="<?= base_url(); ?>/assets/js/extensions/qrcode.min.js"></script>
    <script type="text/javascript">
        new QRCode(document.getElementById("qrcode"), "<?= base_url() . '/enter'; ?>");
    </script>
</body>

</html>