<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code - <?= $asset_name ?></title>
    <link href="<?= base_url('dist_web/dist/css/style.min.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('dist_web/images/amo.png') ?>">
</head>

<body>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-center">
                    <?= $asset_name ?>
                </div>
                <div class="card-body">
                    <center>
                        <div id="qrcode" style="width:190px; height:190px;"></div>
                        <p id="asset_code" class="mt-1"></p>
                    </center>
                </div>
            </div>

        </div>
    </div>
    <script src="<?= base_url('dist_web/libs/qr-code/qrcode.min.js') ?>"></script>
    <script>
        const url = "<?php echo $url_scan ?>";
        const code = "<?php echo $asset_code ?>";

        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width: 190,
            height: 190,
        });
        qrcode.makeCode(url);

        var asset_code = document.getElementById("asset_code");
        asset_code.innerHTML = code;

        window.print();
    </script>
</body>

</html>