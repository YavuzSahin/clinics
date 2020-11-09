<?php
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
$baslik        = $_POST['baslik'];
$baslik_ic     = $_POST['baslik_ic'];
$aciklama      = $_POST['aciklama'];
$kategori        = $_POST['kategori'];
$adres         = $_POST['url'];

$data = [
    'baslik'    =>$baslik,
    'baslik_ic' =>$baslik_ic,
    'aciklama'  =>$aciklama,
    'ust_kategori'    =>$kategori,
    'url'       =>$adres,
    'eklenme_tarihi'=>date('Y-m-d H:i:s'),
    'guncellenme_tarihi'=>date('Y-m-d H:i:s')
];

$save = $db->table('kategori')->insert($data);
if($save){
    echo '<div class="alert alert-success">Kategori başarıyla eklendi.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=kategori" />';

}else{
    echo '<div class="alert alert-danger">Kategori eklenemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=kategori" />';

}