<?php
    //veriler
    include_once '../vendor/autoload.php';
    include_once '../controller/database.php';
    $baslik        = $_POST['baslik'];
    $baslik_ic     = $_POST['baslik_ic'];
    $aciklama      = $_POST['aciklama'];
    $kelime        = $_POST['kelime'];
    $adres         = $_POST['adres'];
    $cdn           = $_POST['cdn'];

        $data = [
            'baslik'    =>$baslik,
            'baslik_ic' =>$baslik_ic,
            'aciklama'  =>$aciklama,
            'kelime'    =>$kelime,
            'url'       =>$adres,
            'cdnurl'    =>$cdn
        ];

        $save = $db->table('site')->where('id', 1)->update($data);
            if($save){
                echo '<div class="alert alert-success">Site bilgileri başarıyla güncellendi.</div>';
                echo '<meta http-equiv="refresh" content="3;URL=site-ayarlari.php" />';

            }else{
                echo '<div class="alert alert-danger">Site bilgileri güncellenemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
                echo '<meta http-equiv="refresh" content="3;URL=site-ayarlari.php" />';

            }