<div class="wrapper wrapper-content">
    <div class="container-fluid">
        <div class="row">
            <!--<div class="col-4">-->
            <!--    <div class="ibox">-->
            <!--        <div class="ibox-title">-->
            <!--            <div class="ibox-tools">-->
            <!--                <a class="collapse-link">-->
            <!--                    <i class="fa fa-chevron-up"></i>-->
            <!--                </a>-->
            <!--                <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
            <!--                    <i class="fa fa-wrench"></i>-->
            <!--                </a>-->
            <!--                <a class="close-link">-->
            <!--                    <i class="fa fa-times"></i>-->
            <!--                </a>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="ibox-content">-->
            <!--            <h3 class="text-center">Selamat Datang di Guest Book</h3><br>-->
            <!--            <p class="text-center">Terimakasih telah berkunjung ke Toko Kami,<br>Silahkan isi buku tamu ini, akan ada <b>Hadiah menarik</b> untuk setiap pengunjung setia kami</p>-->
            <!--            <p class="text-center">Kami akan memberikan penawaran menarik setiap hari</p>-->
            <!--        </div>-->
            <!--        <div class="ibox-footer">-->
            <!--            <h3 class="text-center">Terimakasih Atas Kunjungannya</h3>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="col-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5 class="h5">Form Visitors</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="formAtas">
                            <div class="form-group">
                                <label for="name">Nama <sup class="text-danger">*</sup></label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= set_value('nama'); ?>" autofocus>
                            </div> 
                            <div class="form-group">
                                <label for="">No. HP <sup class="text-danger">*</sup></label>
                                <input type="text" name="nohp" id="nohp" class="form-control" placeholder="0812xxx..." value="<?= set_value('nohp'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="">E-Mail <sup class="text-danger">*</sup></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="example@domain.com" value="<?= set_value('email'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Instagram</label>
                                <input type="text" name="ig" id="ig" class="form-control" placeholder="@yourig" value="<?= set_value('ig'); ?>">
                            </div> 
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3" class="form-control" ><?= set_value('alamat'); ?></textarea>
                                <input type="hidden" name="location" id="location">
                                <input type="hidden" name="pos" id="pos" value="<?= $lok; ?>">
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="">Pesan/ Kesan</label>
                                <textarea name="note" id="note" rows="3" class="form-control"><?= set_value('note'); ?></textarea>
                            </div>
                            -->
                        </form>
                        <a class="btn btn-warning"><span class="fa fa-close"></span> Batal</a>
                        <button class="btn btn-primary float-right simpan"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                    <div class="ibox-footer">
                        <em class="text-danger text-bold">Note : (*) => Wajib diisi</em>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// $ip_address = $_SERVER['REMOTE_ADDR'];
// $location = file_get_contents('http://ipinfo.io/' . $ip_address . '/json');
// $location_data = json_decode($location, true);
// if($location_data) {
//     $city = $location_data['city'];
//     $region = $location_data['region'];
//     $country = $location_data['country'];

//     echo $city;
// }
?>
<script>
    $(document).ready(function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                // console.log('Koordinat geografis Anda saat ini: ' + latitude + ', ' + longitude);
                $("#location").val(latitude + ', ' + longitude);
            });
        } else {
            console.log('Browser tidak mendukung Geolocation API.');
        }
    });
    
    $(document).ready(function() {
        $(".simpan").click(function() {
            var form = $("#formAtas").serializeArray();
            var nama = $("#nama").val();
            var nohp = $("#nohp").val();
            var email = $("#email").val();

            if ((nama == '' && nohp != '') || (nama == '' && email != '')) {
                swal.fire(
                    'Ulangi',
                    'Field Nama harus diisi',
                    'warning'
                );
            } else if ((nohp == '' && nama != '') || (nohp == '' && email != '')) {
                swal.fire(
                    'Ulangi',
                    'Field No. HP harus diisi',
                    'warning'
                );
            } else if ((email == '' && nohp != '') || (email == '' && nama != '')) {
                swal.fire(
                    'Ulangi',
                    'Field Email harus diisi',
                    'warning'
                );
            } else if (nama == '' && email == '' && nohp == '') {
                swal.fire(
                    'Ulangi',
                    'Form masih kosong',
                    'warning'
                );
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('visitor/saveData') ?>",
                    data: form,
                    success: function(data) {
                        var tokens = data;
                        var urlx = "<?= base_url('visitor/voucerPdf/') ?>" + tokens;
                        swal.fire({
                            title: 'Terimakasih!',
                            width: 600,
                            imageUrl: "<?= base_url('uploads/voucer/yourvoucer.jpg') ?>",
                            imageHeight: 150,
                            html: 'Anda berhak mendapatkan <b>E-Voucher Belanja Senilai 100RB!</b>\n' +
                                '<p>Screenshoot pop-up ini atau <a href="' + urlx + '" target="_blank">download</a> dan tunjukkan pada saat anda Belanja di Showroom/ Website Mr.Kitchen</p>' +
                                '<p class="text-danger"><a href="https://www.mrkitchen.co.id/katalog-mrkitchen.pdf">Download Catalog</a></p>',
                            allowOutsideClick: false,
                            confirmButtonColor: '#FF4500',
                            confirmButtonText: 'Tutup',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            }
                        }).then((resl)=> {
                            if(resl.isConfirmed){
                                window.location.reload();
                            }
                        })
                    }
                });
            }
        })

    });
</script>