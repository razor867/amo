</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<footer class="footer text-center">
    All Rights Reserved by Flexy Admin. Designed and Developed by <a href="https://www.wrappixel.com">WrapPixel</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                Are you sure you will delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-primary btn_yes">Yes</a>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url('dist_web/libs/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('dist_web/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('dist_web/dist/js/app-style-switcher.js') ?>"></script>
<!--Wave Effects -->
<script src="<?= base_url('dist_web/dist/js/waves.js') ?>"></script>
<!--Menu sidebar -->
<script src="<?= base_url('dist_web/dist/js/sidebarmenu.js') ?>"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('dist_web/dist/js/custom.js') ?>"></script>
<script>
    const site_url = '<?php echo site_url(); ?>';
</script>
<!--This page JavaScript -->
<?php if ($page == 'home') : ?>
    <!--chartis chart-->
    <script src="<?= base_url('dist_web/libs/chartist/dist/chartist.min.js') ?>"></script>
    <script src="<?= base_url('dist_web/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
    <script src="<?= base_url('dist_web/dist/js/pages/dashboards/dashboard1.js') ?>"></script>
<?php else : ?>
    <script src="<?= base_url('dist_web/libs/datatable/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('dist_web/libs/datatable/js/dataTables.bootstrap5.min.js') ?>"></script>
    <script>
        function del(url_del) {
            $('.btn_yes').attr('href', url_del);
        }
    </script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<?php endif ?>

<?php if ($page == 'location') : ?>
    <script src="<?= base_url('dist_web/dist/js/pages/datatable/location_data.js') ?>"></script>
<?php endif ?>

<?php if ($page == 'suppliers') : ?>
    <script src="<?= base_url('dist_web/dist/js/pages/datatable/suppliers_data.js') ?>"></script>
<?php endif ?>

<?php if ($page == 'department') : ?>
    <script src="<?= base_url('dist_web/dist/js/pages/datatable/department_data.js') ?>"></script>
<?php endif ?>

<?php if ($page == 'position') : ?>
    <script src="<?= base_url('dist_web/dist/js/pages/datatable/position_data.js') ?>"></script>
<?php endif ?>

<?php if ($page == 'employee') : ?>
    <script src="<?= base_url('dist_web/dist/js/pages/datatable/employee_data.js') ?>"></script>
<?php endif ?>

<?php if ($page == 'assets') : ?>
    <script src="<?= base_url('dist_web/dist/js/pages/datatable/assets_data.js') ?>"></script>
<?php endif ?>

<?php if (!$sub) : ?>
    <script>
        $(document).ready(function() {
            $(".alert_show").fadeTo(2000, 500).slideUp(500, function() {
                $(".alert_show").slideUp(500);
            });
        });
    </script>
<?php endif ?>
</body>

</html>