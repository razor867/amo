<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= $form_url ?>" method="post" enctype="multipart/form-data">
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
                    <div class="mb-3 row">
                        <label for="about" class="col-sm-3 col-form-label">About</label>
                        <div class="col-sm-9">
                            <textarea name="about" id="about" class="form-control <?= form_error('about') ? 'is-invalid' : '' ?>" cols="30" rows="5"><?= $is_edit ? $data_user->about : set_value('about') ?></textarea>
                            <div class="invalid-feedback">
                                <?= form_error('about') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="picture" class="col-sm-3 col-form-label">Profile Picture</label>
                        <div class="col-sm-3">
                            <img src="<?= base_url('dist_web/images/users/') . $data_user->picture ?>" alt="" class="w-100" id="output">
                        </div>
                        <div class="col-sm-6">
                            <input type="file" onchange="loadFile(event)" class="form-control <?= ($err_upload != '') ? 'is-invalid' : '' ?>" id="picture" name="picture" accept="image/gif, image/jpeg, image/jpg, image/png" value="<?= $is_edit ? $data_user->picture : set_value('picture') ?>">
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
                    // var image = document.getElementById("output");
                    // image.onchange = function() {
                    //     if (this.files[0].size > 1000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                    //         alert("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB");
                    //         this.value = "";
                    //     };
                    // };
                </script>
            </div>
        </div>
    </div>
</div>