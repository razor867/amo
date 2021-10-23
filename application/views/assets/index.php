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
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Export Data</a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= base_url('assets/form') ?>" class="float-end btn btn-primary"><i class="mdi mdi-note-plus"></i> Add</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="tabledata" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Picture</th>
                                <th>Asset Name</th>
                                <th>Asset Code</th>
                                <th>Serial Number</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>