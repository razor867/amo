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
                        <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control <?= form_error('nip') ? 'is-invalid' : '' ?>" id="nip" name="nip" value="<?= $is_edit ? $nip : set_value('nip') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('nip') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="position_id" class="col-sm-3 col-form-label">Position</label>
                        <div class="col-sm-9">
                            <select name="position_id" class="form-control <?= form_error('position_id') ? 'is-invalid' : '' ?>" id="position_id">
                                <?php if ($is_edit) : ?>
                                    <option value="<?= $position_id ?>"><?= $position_name ?></option>
                                <?php else : ?>
                                    <option value="">-- Choose Position --</option>
                                <?php endif ?>
                                <?php foreach ($data_position->result() as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $r->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('position_id') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="department_id" class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9">
                            <select name="department_id" class="form-control <?= form_error('department_id') ? 'is-invalid' : '' ?>" id="position_id">
                                <?php if ($is_edit) : ?>
                                    <option value="<?= $department_id ?>"><?= $department_name ?></option>
                                <?php else : ?>
                                    <option value="">-- Choose Department --</option>
                                <?php endif ?>
                                <?php foreach ($data_department->result() as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $r->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('position_id') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="place_of_birth" class="col-sm-3 col-form-label">Place of birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control <?= form_error('place_of_birth') ? 'is-invalid' : '' ?>" id="place_of_birth" name="place_of_birth" value="<?= $is_edit ? $place_of_birth : set_value('place_of_birth') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('place_of_birth') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_of_birth" class="col-sm-3 col-form-label">Date of birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control <?= form_error('date_of_birth') ? 'is-invalid' : '' ?>" id="date_of_birth" name="date_of_birth" value="<?= $is_edit ? $date_of_birth : set_value('date_of_birth') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('date_of_birth') ?>
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