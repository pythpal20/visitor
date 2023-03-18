<!-- Modal add user -->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLable" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="addUserLable">Form Input User Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="namauser">Nama User</label>
                            <input type="text" name="namauser" id="namauser" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="email">E-Mail</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="account@yourdomain.com">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control role">
                                <option value="">Pilih</option>
                                <?php foreach ($rolex->result() as $role) : ?>
                                    <option value="<?= $role->role_id ?>"><?= $role->role_name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="password1">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="password">
                                <div class="input-group-append">
                                    <span id="mybutton" onclick="change()" class="input-group-text">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="password2">Ulangi Password</label>
                            <div class="input-group">
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Ulangi Password">
                                <div class="input-group-append">
                                    <span id="mybutton2" class="input-group-text cange">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="xuser" id="xuser" value="<?= $user['user_nama']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="simpan" class="btn btn-primary simpan">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- style tambahan -->
<style>
    #toolbar {
        margin: 0;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?= $title; ?></h2>
    </div>
</div>
<!-- content dibawah ini  -->
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('namauser', '<div class="alert alert-danger" id="alert1" role="alert">', '</div>'); ?>
            <?= form_error('email', '<div class="alert alert-danger" id="alert2" role="alert">', '</div>'); ?>
            <?= form_error('role', '<div class="alert alert-danger" id="alert3" role="alert">', '</div>'); ?>
            <?= form_error('password', '<div class="alert alert-danger" id="alert4" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <script>
                const alertElements = document.getElementById('alert1');
                const alertElementx = document.getElementById('alert2');
                const alertElementz = document.getElementById('alert3');
                const alertElementr = document.getElementById('alert4');

                // Setelah 5 detik, hapus alert
                setTimeout(function() {
                    alertElements.style.display = 'none';
                }, 2500);
                setTimeout(function() {
                    alertElementx.style.display = 'none';
                }, 3500);
                setTimeout(function() {
                    alertElementz.style.display = 'none';
                }, 4500);
                setTimeout(function() {
                    alertElementr.style.display = 'none';
                }, 5500);
            </script>
            <div class="ibox">
                <div class="ibox-title">
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
                        <button class="btn btn-secondary tambah" data-toggle="tooltip" title="Tambah User"><span class="fa fa-plus-circle"></span> New User</button>
                    </div>
                    <table id="tb_user" data-toggle="tablemwk" data-show-toggle="true" data-show-refresh="true" data-show-pagination-switch="true" data-show-columns="true" data-mobile-responsive="true" data-check-on-init="true" data-advanced-search="true" data-id-table="advancedTable" data-show-print="true" data-show-columns-toggle-all="true">

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".tambah").click(function() {
            $("#addUser").modal('show');

        });
    });
    $(document).ready(function() {
        $table = $("#tb_user")
        $table.bootstrapTable({
            url: "<?= base_url('user/getUser'); ?>",
            toolbar: '#toolbar',
            pagination: true,
            search: true,
            columns: [{
                field: 'no',
                title: 'No',
                sortable: true
            }, {
                field: 'nama',
                title: 'Nama User',
            }, {
                field: 'email',
                title: 'Email',
            }, {
                field: 'date',
                title: 'Tanggal Register',
            }]
        });
    }); 
    </script> 
    <script>
        function change() {
            var x = document.getElementById('password').type;
            if (x == 'password') {
                document.getElementById('password').type = 'text';
                document.getElementById('mybutton').innerHTML = `<i class="fa fa-eye-slash"></i>`;
            } else {
                document.getElementById('password').type = 'password';
                document.getElementById('mybutton').innerHTML = `<i class="fa fa-eye"></i>`;
            }
        }

    $(".cange").click(() => {
        var x = document.getElementById('password2').type;
        if (x == 'password') {
            document.getElementById('password2').type = 'text';
            document.getElementById('mybutton2').innerHTML = `<i class="fa fa-eye-slash"></i>`;
        } else {
            document.getElementById('password2').type = 'password';
            document.getElementById('mybutton2').innerHTML = `<i class="fa fa-eye"></i>`;
        }
    })
</script>