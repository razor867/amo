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
                    <button class="btn btn-primary float-end m-2" type="submit"><i class="mdi mdi-content-save"></i> Save</button>
                    <button class="btn btn-light float-end m-2" type="reset"><i class="mdi mdi-restart"></i> Reset</button>
                    <a href="<?= $back_url ?>" class="btn btn-secondary m-2"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
</div>