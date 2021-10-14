<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= $form_url ?>" method="post">
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
                        <label for="state" class="col-sm-3 col-form-label">State</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= form_error('state') ? 'is-invalid' : '' ?>" id="state" name="state" value="<?= $is_edit ? $state : set_value('state') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('state') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="province" class="col-sm-3 col-form-label">Province</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= form_error('province') ? 'is-invalid' : '' ?>" id="province" name="province" value="<?= $is_edit ? $province : set_value('province') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('province') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="district" class="col-sm-3 col-form-label">District</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= form_error('district') ? 'is-invalid' : '' ?>" id="district" name="district" value="<?= $is_edit ? $district : set_value('district') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('district') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="postcode" class="col-sm-3 col-form-label">Postcode</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control <?= form_error('postcode') ? 'is-invalid' : '' ?>" id="postcode" name="postcode" value="<?= $is_edit ? $postcode : set_value('postcode') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('postcode') ?>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end m-2" type="submit"><i class="mdi mdi-content-save"></i> Save</button>
                    <button class="btn btn-light float-end m-2" type="reset"><i class="mdi mdi-restart"></i> Reset</button>
                    <a href="<?= $back_url ?>" class="btn btn-secondary m-2"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
</div>