<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMO | <?= $asset_name ?></title>

    <link href="<?= base_url('dist_web/dist/css/style.min.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('dist_web/images/amo.png') ?>">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <b>Asset Details</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <img src="<?= site_url() . 'img_up/assets/' . $asset_image ?>" alt="" class="w-50 mb-4">
                                </center>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Asset Name</th>
                                            <td><?= $asset_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><?= $asset_status ?></td>
                                        </tr>
                                        <tr>
                                            <th>Asset Code</th>
                                            <td><?= $asset_code ?></td>
                                        </tr>
                                        <tr>
                                            <th>Detail</th>
                                            <td><?= $asset_detail ?></td>
                                        </tr>
                                        <tr>
                                            <th>Serial Number</th>
                                            <td><?= $asset_serial_number ?></td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td><?= $asset_price ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date Purchase</th>
                                            <td><?= $asset_date_purchase ?></td>
                                        </tr>
                                        <tr>
                                            <th>Supplier Name</th>
                                            <td><?= $asset_supplier_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>Lent to</th>
                                            <td><?= $asset_lent_to ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>