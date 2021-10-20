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
        <div class="alert_show">
            <?php if ($this->session->flashdata('alert')) : ?>
                <div class="alert <?= $this->session->flashdata('alert') == 'success' ? 'alert-success' : 'alert-danger' ?> d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <?php if ($this->session->flashdata('alert') == 'success') : ?>
                            <use xlink:href="#check-circle-fill" />
                        <?php else : ?>
                            <use xlink:href="#exclamation-triangle-fill" />
                        <?php endif ?>
                    </svg>
                    <div>
                        <?= $this->session->flashdata('msg') ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="mb-4">On this page is displayed your profile data and also you can change your profile here.</p>
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?= base_url('dist_web/images/users/') . $data_user->picture ?>" alt="" class="w-100 mb-3">
                        <center>
                            <?php if ($this->ion_auth->in_group('admin')) : ?>
                                <span class="badge bg-secondary text-white">Admin</span>
                            <?php else : ?>
                                <span class="badge bg-secondary text-white">Member</span>
                            <?php endif ?>

                        </center>
                    </div>
                    <div class="col-md-9">
                        <div class="row mb-3">
                            <div class="col-md-2">
                                Full name
                            </div>
                            :
                            <div class="col-md-9">
                                <?= $data_user->first_name . ' ' . $data_user->last_name ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">
                                About
                            </div>
                            :
                            <div class="col-md-9">
                                <?= $data_user->about ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="<?= base_url('profile/form/') . $data_user->id ?>" class="btn btn-primary mt-4" style="float: right;"><span class="mdi mdi-account-edit"></span> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>