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
                                    <?php if ($r->name != 'Default') : ?>
                                        <option value="<?= $r->id ?>"><?= $r->name ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('department_id') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="note_lent" class="col-sm-3 col-form-label">Note (Optional)</label>
                        <div class="col-sm-9">
                            <textarea name="note_lent" id="note_lent" class="form-control <?= form_error('note_lent') ? 'is-invalid' : '' ?>" cols="30" rows="5"><?= set_value('note_lent') ?></textarea>
                            <div class="invalid-feedback">
                                <?= form_error('note_lent') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_lent" class="col-sm-3 col-form-label">Date Lent</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control <?= form_error('date_lent') ? 'is-invalid' : '' ?>" id="date_lent" name="date_lent" value="<?= set_value('date_lent') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('date_lent') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date_lent_returned" class="col-sm-3 col-form-label">Will be Returned Date?</label>
                        <div class="col-sm-4">
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