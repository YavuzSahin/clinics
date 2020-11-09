<?php
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
$baslik        = $_POST['baslik'];
$aciklama      = $_POST['aciklama'];
$adres         = $_POST['url'];

$data = [
    'baslik'    =>$baslik,
    'aciklama'  =>$aciklama,
    'url'       =>$adres,
    'eklenme_tarihi'=>date('Y-m-d H:i:s'),
    'guncellenme_tarihi'=>date('Y-m-d H:i:s')
];

$save = $db->table('etiket')->insert($data);
if($save){
    echo '<div class="alert alert-success">Etiket başarıyla eklendi.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=etiket&p=ekle" />';

}else{
    echo '<div class="alert alert-danger">Etiket eklenemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=etiket" />';

}