<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
    <div class="col">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <span class="btn btn-primary btn-circle d-flex align-items-center" style="width: 50px; height:50px">
                            <i class="mdi mdi-dropbox fs-1"></i>
                        </span>
                    </div>
                    <div class="col-md-9">
                        <h5 style="font-weight: 700;">Total Assets</h5>
                        <h5><?= $total_asset ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <span class="btn btn-primary btn-circle d-flex align-items-center" style="width: 50px; height:50px">
                            <i class="mdi mdi-arrow-expand fs-1"></i>
                        </span>
                    </div>
                    <div class="col-md-9">
                        <h5 style="font-weight: 700;">LentAssets</h5>
                        <h5><?= $total_asset_lent ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <span class="btn btn-primary btn-circle d-flex align-items-center" style="width: 50px; height:50px">
                            <i class="mdi mdi-arrow-compress fs-1"></i>
                        </span>
                    </div>
                    <div class="col-md-9">
                        <h5 style="font-weight: 700;">Returned Assets</h5>
                        <h5><?= $total_asset_returned ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <span class="btn btn-primary btn-circle d-flex align-items-center" style="width: 50px; height:50px">
                            <i class="mdi mdi-image-broken fs-1"></i>
                        </span>
                    </div>
                    <div class="col-md-9">
                        <h5 style="font-weight: 700;">Broken Assets</h5>
                        <h5><?= $total_asset_broken ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <span class="btn btn-primary btn-circle d-flex align-items-center" style="width: 50px; height:50px">
                            <i class="mdi mdi-clock-fast fs-1"></i>
                        </span>
                    </div>
                    <div class="col-md-9">
                        <h5 style="font-weight: 700;">Repair Assets</h5>
                        <h5><?= $total_asset_repair ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card card-dashboard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <span class="btn btn-primary btn-circle d-flex align-items-center" style="width: 50px; height:50px">
                            <i class="mdi mdi-settings fs-1"></i>
                        </span>
                    </div>
                    <div class="col-md-9">
                        <h5 style="font-weight: 700;">Lost Assets</h5>
                        <h5><?= $total_asset_lost ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Summary in <?= date("Y") ?></h4>
                        <h6 class="card-subtitle">Lent Asset Vs Returned Asset</h6>
                    </div>
                    <div class="ms-auto d-flex no-block align-items-center">
                        <li class="list-inline-item d-flex align-items-center text-primary"><i class="fa fa-circle font-10 me-1"></i> Lent
                        </li>
                        <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                            <li class="list-inline-item d-flex align-items-center text-info"><i class="fa fa-circle font-10 me-1"></i> Returned
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="amp-pxl mt-4" style="height: 350px;">
                    <div class="chartist-tooltip"></div>
                </div>
                <script>
                    const dataLent = <?php echo json_encode($dataLent) ?>;
                    const dataReturned = <?php echo json_encode($dataReturned) ?>;
                </script>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->
<!-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex">
                    <div>
                        <h4 class="card-title">Top Selling Products</h4>
                        <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="dl">
                            <select class="form-select shadow-none">
                                <option value="0" selected>Monthly</option>
                                <option value="1">Daily</option>
                                <option value="2">Weekly</option>
                                <option value="3">Yearly</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Products</th>
                                <th class="border-top-0">License</th>
                                <th class="border-top-0">Support Agent</th>
                                <th class="border-top-0">Technology</th>
                                <th class="border-top-0">Tickets</th>
                                <th class="border-top-0">Sales</th>
                                <th class="border-top-0">Earnings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a class="btn btn-circle d-flex btn-info text-white">EA</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Elite Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="badge bg-danger">Angular</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a class="btn btn-circle d-flex btn-orange text-white">MA</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Monster Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>Venessa Fern</td>
                                <td>
                                    <label class="badge bg-info">Vue Js</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a class="btn btn-circle d-flex btn-success text-white">MP</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Material Pro Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="badge bg-success">Bootstrap</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10"><a class="btn btn-circle d-flex btn-purple text-white">AA</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Ample Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="badge bg-purple">React</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ============================================================== -->
<!-- Table -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->
<!-- <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Comments</h4>
            </div>
            <div class="comment-widgets scrollable">
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2"><img src="<?= base_url('assets/images/users/1.jpg') ?>" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">James Anderson</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                            and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="text-muted float-end">April 14, 2021</span> <span class="badge bg-primary">Pending</span> <span class="action-icons">
                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row comment-row">
                    <div class="p-2"><img src="<?= base_url('assets/images/users/4.jpg') ?>" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">Michael Jorden</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                            and type setting industry. </span>
                        <div class="comment-footer ">
                            <span class="text-muted float-end">April 14, 2021</span>
                            <span class="badge bg-success">Approved</span>
                            <span class="action-icons active">
                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                <a href="javascript:void(0)"><i class="icon-close"></i></a>
                                <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row comment-row">
                    <div class="p-2"><img src="<?= base_url('assets/images/users/5.jpg') ?>" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Johnathan Doeting</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing
                            and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="text-muted float-end">April 14, 2021</span>
                            <span class="badge bg-danger">Rejected</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Temp Guide</h4>
                <div class="d-flex align-items-center flex-row m-t-30">
                    <div class="display-5 text-info"><i class="wi wi-day-showers"></i>
                        <span>73<sup>°</sup></span>
                    </div>
                    <div class="m-l-10">
                        <h3 class="m-b-0">Saturday</h3><small>Ahmedabad, India</small>
                    </div>
                </div>
                <table class="table no-border mini-table m-t-20">
                    <tbody>
                        <tr>
                            <td class="text-muted">Wind</td>
                            <td class="font-medium">ESE 17 mph</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Humidity</td>
                            <td class="font-medium">83%</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Pressure</td>
                            <td class="font-medium">28.56 in</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Cloud Cover</td>
                            <td class="font-medium">78%</td>
                        </tr>
                    </tbody>
                </table>
                <ul class="row list-style-none text-center m-t-30">
                    <li class="col-3">
                        <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                        <span class="d-block text-muted">09:30</span>
                        <h3 class="m-t-5">70<sup>°</sup></h3>
                    </li>
                    <li class="col-3">
                        <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                        <span class="d-block text-muted">11:30</span>
                        <h3 class="m-t-5">72<sup>°</sup></h3>
                    </li>
                    <li class="col-3">
                        <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                        <span class="d-block text-muted">13:30</span>
                        <h3 class="m-t-5">75<sup>°</sup></h3>
                    </li>
                    <li class="col-3">
                        <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                        <span class="d-block text-muted">15:30</span>
                        <h3 class="m-t-5">76<sup>°</sup></h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> -->
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->