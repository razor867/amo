<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link active" id="lent" href="javascript:void(0)">Lent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="returned" href="javascript:void(0)">Returned</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="broken" href="javascript:void(0)">Broken</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="repair" href="javascript:void(0)">Repair</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="repaired" href="javascript:void(0)">Repaired</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lost" href="javascript:void(0)">Lost</a>
                    </li>
                </ul>
            </div>
            <div id="lent_card" class="card-body d-block">
                <h5 class="card-title">Lent Asset</h5>
                <p class="card-text">On this page displays data on assets that are being loaned.</p>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Export Data</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="tableLent" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asset Name</th>
                                <th>Borrower</th>
                                <th>Date Lent</th>
                                <th>Date Lent Returned</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div id="returned_card" class="card-body d-none">
                <h5 class="card-title">Returned Asset</h5>
                <p class="card-text">On this page displays the asset data that has been returned.</p>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Export Data</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="tableReturned" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asset Name</th>
                                <th>Borrower</th>
                                <th>Date Returned</th>
                                <th>Fine</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div id="broken_card" class="card-body d-none">
                <h5 class="card-title">Broken Asset</h5>
                <p class="card-text">On this page displays the damaged asset data.</p>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Export Data</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="tableBroken" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asset Name</th>
                                <th>Aseet Code</th>
                                <th>Serial Number</th>
                                <th>Date Purchase</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div id="repair_card" class="card-body d-none">
                <h5 class="card-title">Repair Asset</h5>
                <p class="card-text">On this page displays asset data that is being repaired.</p>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Export Data</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="tableRepair" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asset Name</th>
                                <th>Repair by</th>
                                <th>Start Repair</th>
                                <th>End Repair</th>
                                <th>Cost</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div id="repaired_card" class="card-body d-none">
                <h5 class="card-title">Repaired Asset</h5>
                <p class="card-text">On this page displays asset data that has been repaired.</p>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Export Data</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="tableRepaired" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asset Name</th>
                                <th>Repair by</th>
                                <th>Start Repair</th>
                                <th>End Repair</th>
                                <th>Cost</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div id="lost_card" class="card-body d-none">
                <h5 class="card-title">Lost Asset</h5>
                <p class="card-text">On this page displays the asset data that has been lost.</p>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-secondary">Export Data</a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="tableLost" class="table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asset Name</th>
                                <th>Aseet Code</th>
                                <th>Serial Number</th>
                                <th>Date Purchase</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>