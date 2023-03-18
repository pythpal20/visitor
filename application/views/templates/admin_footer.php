<div class="footer">
    <div class="float-right">
        <strong>Copyright</strong> PT. Mutli Wahana Kencana &copy; <?= date('Y') ?>
    </div>
</div>
</div>
</div>

<!-- Mainly scripts -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= base_url('assets/'); ?>js/inspinia.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/pace/pace.min.js"></script>
<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<!-- table-bootstrap -->
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/fixed-columns/bootstrap-table-fixed-columns.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.20.2/dist/extensions/export/bootstrap-table-export.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/print/bootstrap-table-print.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/toolbar/bootstrap-table-toolbar.min.js"></script>
<script>
    $(document).ready(function() {
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
            $('[rel="tooltip"]').tooltip()
        });

        $(".bukaForm").click(() => {
            $("#formModal").modal({
                keyboard: false,
                backdrop: "static",
                show: true
            });

            function makeid(length) {
                var result = [];
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result.push(characters.charAt(Math.floor(Math.random() *
                        charactersLength)));
                }
                return result.join('');
            }

            document.getElementById("code").value = makeid(10);
        });

    });
    
</script>
</body>

</html>