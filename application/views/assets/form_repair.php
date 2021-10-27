<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
<div class="row">
    <div class="col-12">
        <?php if ($this->session->flashdata('alert')) : ?>
            <div class="alert <?= $this->session->flashdata('alert') == 'success' ? 'alert-success' : 'alert-danger' ?> d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    <?= $this->session->flashdata('msg') ?>
                </div>
            </div>
        <?php endif ?>
        <div class="card">
            <div class="card-body">
                <form action="<?= $form_url ?>" method="post">
                    <input type="hidden" name="asset_id" value="<?= $asset_id ?>">
                    <center>
                        <h3><?= $asset_name ?></h3>
                    </center>
                    <hr>
                    <div class="mb-3 row">
                        <label for="repair_by" class="col-sm-3 col-form-label">Repair by (Company or etc.)</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= form_error('repair_by') ? 'is-invalid' : '' ?>" id="repair_by" name="repair_by" value="<?= set_value('repair_by') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('repair_by') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="start_repair" class="col-sm-3 col-form-label">Date Start Repair</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control <?= form_error('start_repair') ? 'is-invalid' : '' ?>" id="start_repair" name="start_repair" value="<?= set_value('start_repair') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('start_repair') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="end_repair" class="col-sm-3 col-form-label">Date End Repair</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control <?= form_error('end_repair') ? 'is-invalid' : '' ?>" id="end_repair" name="end_repair" value="<?= set_value('end_repair') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('end_repair') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="cost" class="col-sm-3 col-form-label">Cost</label>
                        <div class="col-sm-9">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" name="cost" class="form-control <?= form_error('cost') ? 'is-invalid' : '' ?>" min="0" value="<?= (set_value('cost') != '') ? set_value('cost') : 0 ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('cost') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="note_repair" class="col-sm-3 col-form-label">Note (Optional)</label>
                        <div class="col-sm-9">
                            <textarea name="note_repair" id="note_repair" class="form-control <?= form_error('note_repair') ? 'is-invalid' : '' ?>" cols="30" rows="5"><?= set_value('note_repair') ?></textarea>
                            <div class="invalid-feedback">
                                <?= form_error('note_repair') ?>
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