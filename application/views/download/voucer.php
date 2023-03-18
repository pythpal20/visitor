<?php
$pathimage = encode_img_base64('./uploads/voucer/yourvoucer.jpg');

function encode_img_base64($img_path = false, $img_type = 'png')
{
    if ($img_path) {
        //convert image into Binary data
        $img_data = fopen($img_path, 'rb');
        $img_size = filesize($img_path);
        $binary_image = fread($img_data, $img_size);
        fclose($img_data);

        $img_src = "data:image/" . $img_type . ";base64," . str_replace("\n", "", base64_encode($binary_image));

        return $img_src;
    }

    return false;
}
?>
<style>
    .gambar {
        position: fixed;
        height: auto;
        width: 100%;
        display: block;
    }

    .background-image {
        position: relative;
    }

    @page {
        margin: 0px;
    }

    body {
        margin: 0px;
    }

    .putih {
        position: absolute;
        left: 2.5%;
        top: 93%;
        color: white;
        font-weight: bold;
        z-index: 1;
    }
</style>
<div class="background-image">
    <img src="<?= $pathimage; ?>" alt="" class="gambar">
    <div class="putih"><?= $pengunjung['visitor_name'] ?> | <?= date("d-m-Y", $pengunjung['date_created']) ?> | <?= $pengunjung['visitor_hp'] ?></div>
</div>