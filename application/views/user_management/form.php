<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= $form_url ?>" method="post">
                    <div class="mb-3 row">
                        <label for="first_name" class="col-sm-3 col-form-label">Firstname</label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" class="form-control <?= form_error('first_name') ? 'is-invalid' : '' ?>" id="first_name" value="<?= $is_edit ? $data_user->first_name : set_value('first_name') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('first_name') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="last_name" class="col-sm-3 col-form-label">Lastname</label>
                        <div class="col-sm-9">
                            <input type="text" name="last_name" class="form-control <?= form_error('last_name') ? 'is-invalid' : '' ?>" id="last_name" value="<?= $is_edit ? $data_user->last_name : set_value('last_name') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('last_name') ?>
                            </div>
                        </div>
                    </div>
                    <?php if (!$is_edit) : ?>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" value="<?= $is_edit ? $data_user->email : set_value('email') ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('email') ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="mb-3 row">
                        <label for="company" class="col-sm-3 col-form-label">Company</label>
                        <div class="col-sm-9">
                            <input type="text" name="company" class="form-control <?= form_error('company') ? 'is-invalid' : '' ?>" id="company" value="<?= $is_edit ? $data_user->company : set_value('company') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('company') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" name="phone" class="form-control <?= form_error('phone') ? 'is-invalid' : '' ?>" id="phone" value="<?= $is_edit ? $data_user->phone : set_value('phone') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('phone') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" value="<?= $is_edit ? '' : set_value('password') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirm" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password_confirm" class="form-control <?= form_error('password_confirm') ? 'is-invalid' : '' ?>" id="password_confirm" value="<?= $is_edit ? '' : set_value('password_confirm') ?>">
                            <div class="invalid-feedback">
                                <?= form_error('password_confirm') ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($is_edit) : ?>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-3 col-form-label">Groups</label>
                            <div class="col-sm-9">
                                <?php
                                $no = 1;
                                foreach ($groups as $r) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="groups[]" value="<?= $r['id'] ?>" id="<?= 'checkbox' . $no ?>" <?= (in_array($r, $currentGroups)) ? 'checked="checked"' : null ?>>
                                        <label class="form-check-label" for="<?= 'checkbox' . $no ?>">
                                            <?= $r['name'] ?>
                                        </label>
                                    </div>
                                    <?php $no++ ?>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <button class="btn btn-primary float-end m-2" type="submit"><i class="mdi mdi-content-save"></i> Save</button>
                    <button class="btn btn-light float-end m-2" type="reset"><i class="mdi mdi-restart"></i> Reset</button>
                    <a href="<?= $back_url ?>" class="btn btn-secondary m-2"><i class="mdi mdi-arrow-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
</div>