</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; <?= date('Y') ?> Ela Admin
            </div>
            <div class="col-sm-6 text-right">
                Designed by <a href="https://colorlib.com/">Colorlib</a>
            </div>
        </div>
    </div>
</footer>
</div>
<script src="<?= base_url('assets/js/vendor/jquery-2.1.4.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/plugins.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/main.js') ?>" type="text/javascript"></script>

 <!-- End custom js for this page -->
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
 
<script>
    $(document).ready(function() {

        $(".del-record").click(function() {

            if (!confirm("Do you Want to Delete Record")) {
                return false;
            }
        });

    });
</script>
</body>

</html>