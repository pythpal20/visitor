<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?= $title; ?></h2>
    </div>
</div>
<!-- content dibawah ini  -->
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('nama', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
            <?= form_error('nohp', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
            <?= form_error('email', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
            <?= form_error('tanggal', '<div class="alert alert-warning" role="alert">', '</div>'); ?>
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Data Pengunjung Harian</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="toolbar">
                        <button class="btn btn-md btn-info bukaForm" data-toggle="tooltip" title="Tambah data pengunjung khusus website"><i class="fa fa-plus-circle"></i> Pengunjung Website</button>
                    </div>
                    <table id="tb_pengunjung" data-toggle="tb_pengunjung" data-show-toggle="true" data-show-refresh="true" data-show-pagination-switch="true" data-show-columns="true" data-mobile-responsive="true" data-check-on-init="true" data-advanced-search="true" data-id-table="advancedTable" data-show-print="true" data-show-columns-toggle-all="true"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pop-up form -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('admin/pengunjung') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h5" id="formModalLabel">Form pengunjung website baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="code" id="code">
                        <label for="">Nama Pengunjung</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama pengunjung">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="">No. HP</label>
                            <input type="text" id="nohp" name="nohp" class="form-control" placeholder="08xxx xxx">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">E-Mail</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="example@domain.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="">Tanggal Download Katalog</label>
                            <input type="datetime-local" id="tanggal" name="tanggal" class="form-control" placeholder="YYYY-mm-dd HH:ii">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Lokasi</label>
                            <input type="text" name="locasi" id="locasi" value="Website" readonly class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Pop-up detail-->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="isiModal">
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Tunggu sampai semua elemen pada halaman sudah dimuat
    $(document).ready(function() {
        // Ambil semua elemen alert pada halaman
        var alerts = $('.alert');

        // Loop melalui setiap elemen alert
        $.each(alerts, function(index, alert) {
            // Buat fungsi untuk menghilangkan elemen alert setelah 2 detik
            setTimeout(function() {
                $(alert).fadeOut('slow');
            }, 2000);
        });
    });
    
    $(document).ready(function() {
        $table = $("#tb_pengunjung")
        $table.bootstrapTable({
            url: "<?= base_url('admin/dataPengunjungs'); ?>",
            search: true,
            pagination: true,
            toolbar: '#toolbar',
            columns: [{
                field: 'tgl',
                title: 'Tgl. Kunjungan',
                sortable: true
            }, {
                field: 'nama',
                title: 'Nama Pengunjung',
                sortable: true
            }, {
                field: 'nohp',
                title: 'No. Hp',
                sortable: true,
                align: 'right'
            }, {
                field: 'email',
                title: 'Email',
                sortable: true,
                align: 'right'
            }, {
                field: 'loc',
                title: 'Lokasi',
                align: 'center'
            }, {
                field: 'token',
                title: 'Aksi',
                formatter: function(value) {
                    return [
                        '<button class="btn btn-xs btn-success lihat" data-id="' + value + '" data-toggle="tooltip" title="Lihat Detail"><i class="fa fa-eye"></i></button>'
                    ]
                },
                align: 'center'
            }]
        });

        $('body').on('click', '#tb_pengunjung .lihat', function() {
            var id = $(this).data('id');
            var xhr = new XMLHttpRequest();
            // console.log(id);
            xhr.open('GET', "<?= base_url('admin/detailPengunjung/') ?>" + id, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = xhr.responseText;
                    // kode untuk menampilkan modal
                    $('#modalDetail').modal('show');
                    $("#isiModal").html(data);
                    // console.log(data)
                } else {
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            };
            xhr.send();
        })
    });
</script>