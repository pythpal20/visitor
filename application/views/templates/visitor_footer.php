<div class="footer">
    <div class="float-right">
        <strong>Copyright</strong> IT Dept PT. Multi Wahana Kencana &copy; <?= date('Y'); ?>
    </div>
</div>

</div>
</div>



<!-- Mainly scripts -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0afcaf4d10.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/bootstrap.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= base_url('assets/'); ?>js/inspinia.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/pace/pace.min.js"></script>

<!-- Flot -->
<script src="<?= base_url('assets/'); ?>js/plugins/flot/jquery.flot.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/plugins/flot/jquery.flot.resize.js"></script>

<!-- ChartJS-->
<script src="<?= base_url('assets/'); ?>js/plugins/chartJs/Chart.min.js"></script>
<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Peity -->
<script src="<?= base_url('assets/'); ?>js/plugins/peity/jquery.peity.min.js"></script>
<!-- Peity demo -->
<script src="<?= base_url('assets/'); ?>js/demo/peity-demo.js"></script>
<script>
    $(document).ready(function() {
        var elem = document.documentElement;
        var requestFullScreen = elem.requestFullscreen || elem.mozRequestFullScreen || elem.webkitRequestFullScreen || elem.msRequestFullscreen;

        if (requestFullScreen) {
            requestFullScreen.call(elem);
        }

        document.addEventListener("fullscreenchange", function () {
            if (!document.fullscreenElement) {
            // menangani kejadian ketika pengguna keluar dari mode layar penuh
            }
        });
    });
    $(document).ready(function() {
        var fullscreenBtn = document.getElementById("fullscreen-btn");
        var exitFullscreenBtn = document.getElementById("exit-fullscreen-btn");
        var elem = document.documentElement;
        $(".xfullscreen").hide();

        fullscreenBtn.addEventListener("click", function() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE11 */
                elem.msRequestFullscreen();
            }

            fullscreenBtn.style.display = "none";
            exitFullscreenBtn.style.display = "inline-block";
        });

        exitFullscreenBtn.addEventListener("click", function() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                /* IE11 */
                document.msExitFullscreen();
            }

            fullscreenBtn.style.display = "inline-block";
            exitFullscreenBtn.style.display = "none";
        });
    })
</script>

</body>

</html>