<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= $form_url ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" id="name" value="<?= $is_edit ? $name : set_value('name') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('name') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="detail" class="col-sm-3 col-form-label">Detail</label>
                        <div class="col-sm-9">
                            <textarea name="detail" id="detail" class="form-control <?= form_error('detail') ? 'is-invalid' : '' ?>" cols="30" rows="5"><?= $is_edit ? $detail : set_value('detail') ?></textarea>
                            <div class="invalid-feedback">
                                <?= form_error('detail') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="supplier_id" class="col-sm-3 col-form-label">Supplier</label>
                        <div class="col-sm-9">
                            <select name="supplier_id" class="form-control <?= form_error('supplier_id') ? 'is-invalid' : '' ?>" id="supplier_id">
                                <?php if ($is_edit) : ?>
                                    <option value="<?= $supplier_id ?>"><?= $supplier_name ?></option>
                                <?php else : ?>
                                    <option value="">-- Choose Supplier --</option>
                                <?php endif ?>
                                <?php foreach ($data_supplier->result() as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $r->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('supplier_id') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" name="price" class="form-control <?= form_error('price') ? 'is-invalid' : '' ?>" value="<?= $is_edit ? $price : set_value('price') ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('price') ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="serial_number" class="col-sm-3 col-form-label">Serial Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control <?= form_error('serial_number') ? 'is-invalid' : '' ?>" id="serial_number" name="serial_number" value="<?= $is_edit ? $serial_number : set_value('serial_number') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('serial_number') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_purchase" class="col-sm-3 col-form-label">Date Purchase</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control <?= form_error('date_purchase') ? 'is-invalid' : '' ?>" id="date_purchase" name="date_purchase" value="<?= $is_edit ? $date_purchase : set_value('date_purchase') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('date_purchase') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select name="status" class="form-control <?= form_error('status') ? 'is-invalid' : '' ?>" id="status">
                                <?php if ($is_edit) : ?>
                                    <option value="<?= $status ?>"><?= $status ?></option>
                                <?php else : ?>
                                    <option value="">-- Choose Status --</option>
                                <?php endif ?>
                                <option value="Ready">Ready</option>
                                <option value="Lent">Lent</option>
                                <option value="Broken">Broken</option>
                                <option value="Lost">Lost</option>
                                <option value="Repair">Repair</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('status') ?>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="picture" class="col-sm-3 col-form-label">Asset Image</label>
                        <div class="col-sm-3">
                            <img src="<?= $is_edit ? $image_display : $image_default ?>" alt="" class="w-100" id="output">
                        </div>
                        <div class="col-sm-6">
                            <input type="file" onchange="loadFile(event)" class="form-control <?= ($err_upload != '') ? 'is-invalid' : '' ?>" id="picture" name="picture" accept="image/gif, image/jpeg, image/jpg, image/png" value="<?= $is_edit ? $picture : set_value('picture') ?>">
                            <div class="invalid-feedback">
                                <?= $err_upload ?>
                            </div>
                            <small>Max size is 1MB</small>
                        </div>
                    </div>

                    <button class="btn btn-primary float-end m-2" type="submit"><i class="mdi mdi-content-save"></i> Save</button>
                    <button class="btn btn-light float-end m-2" type="reset"><i class="mdi mdi-restart"></i> Reset</button>
                    <a href="<?= $back_url ?>" class="btn btn-secondary m-2"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
                <script>
                    var loadFile = function(event) {
                        var image = document.getElementById("output");
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                    console.log(<?php echo $err_upload ?>);
                </script>
            </div>
        </div>
    </div>
</div>