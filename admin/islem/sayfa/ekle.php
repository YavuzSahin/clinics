<?php
include_once '../vendor/autoload.php';
include_once '../controller/database.php';

$baslik         = $_POST['baslik'];
$baslik_ic         = $_POST['baslik_ic'];
$url         = $_POST['url'];
$aciklama         = $_POST['aciklama'];
$kategori         = $_POST['kategori'];
$etiket         = $_POST['etiket'];
$icerik         = $_POST['icerik'];
if(isset($_POST['sabit'])){$sabit = 1;}else{$sabit=0;}
if(isset($_POST['anasayfa'])){$anasayfa = 1;}else{$anasayfa=0;}
if(isset($_POST['slider'])){$slider = 1;}else{$slider=0;}
$image = $_FILES['image'];

var_dump($_POST);
/*







$data = [

    'eklenme_tarihi'=>date('Y-m-d H:i:s'),
    'guncellenme_tarihi'=>date('Y-m-d H:i:s')
];

$save = $db->table('sayfa')->insert($data);
if($save){
    echo '<div class="alert alert-success">Sayfa başarıyla eklendi.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=icerik" />';
}else{
    echo '<div class="alert alert-danger">Sayfa eklenemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=icerik" />';
}

*/