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
                        <label for="individualis" class="col-sm-3 col-form-label">Lent to individuals?</label>
                        <div class="col-sm-9">
                            <input id="individualis" class="form-check-input" type="checkbox" name="individualis" value="yes" id="invalidCheck">
                            <label class="form-check-label" for="invalidCheck">
                                Yes
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="employee_id" class="col-sm-3 col-form-label">Employee</label>
                        <div class="col-sm-9">
                            <select name="employee_id" class="form-control <?= form_error('employee_id') ? 'is-invalid' : '' ?>" id="employee_id">
                                <option value="">-- Choose Employee --</option>
                                <?php foreach ($data_employee->result() as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $r->name . ' (' . $r->nip . ' - ' . $r->position_name . ')' ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('employee_id') ?>
                            </div>
                        </div>
                    </div>
                    <div id="department_input" class="mb-3 row">
                        <label for="department_id" class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9">
                            <select name="department_id" class="form-control <?= form_error('department_id') ? 'is-invalid' : '' ?>" id="department_id">
                                <option value="">-- Choose Department --</option>
                                <?php foreach ($data_department->result() as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $r->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('department_id') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="note_lent" class="col-sm-3 col-form-label">Note</label>
                        <div class="col-sm-9">
                            <textarea name="note_lent" id="note_lent" class="form-control <?= form_error('note_lent') ? 'is-invalid' : '' ?>" cols="30" rows="5"><?= set_value('note_lent') ?></textarea>
                            <div class="invalid-feedback">
                                <?= form_error('note_lent') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_lent" class="col-sm-3 col-form-label">Date Lent</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control <?= form_error('date_lent') ? 'is-invalid' : '' ?>" id="date_lent" name="date_lent" value="<?= set_value('date_lent') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('date_lent') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_lent_returned" class="col-sm-3 col-form-label">Date Returned</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control <?= form_error('date_lent_returned') ? 'is-invalid' : '' ?>" id="date_lent_returned" name="date_lent_returned" value="<?= set_value('date_lent_returned') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('date_lent_returned') ?>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end m-2" type="submit"><i class="mdi mdi-content-save"></i> Save</button>
                    <button class="btn btn-light float-end m-2" type="reset"><i class="mdi mdi-restart"></i> Reset</button>
                    <a href="<?= $back_url ?>" class="btn btn-secondary m-2"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
                <script>
                    const cb = document.getElementById('individualis');
                    const departmentInput = document.getElementById('department_input');
                    cb.onclick = function() {
                        if (cb.checked == true) {
                            departmentInput.style.display = 'none';
                        } else {
                            departmentInput.style.display = '';
                        }
                    };
                </script>
            </div>
        </div>
    </div>
</div>