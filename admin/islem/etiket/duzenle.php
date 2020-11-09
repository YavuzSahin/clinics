<?php
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
$id            = $_POST['id'];
$baslik        = $_POST['baslik'];
$aciklama      = $_POST['aciklama'];
$adres         = $_POST['url'];

$data = [
    'baslik'            => $baslik,
    'aciklama'          => $aciklama,
    'url'               => $adres,
    'guncellenme_tarihi'=> date('Y-m-d H:i:s')
];

$save = $db->table('etiket')->where('id', $id)->update($data);
if($save){
    echo '<div class="alert alert-success">Etiket başarıyla güncellendi.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=etiket" />';

}else{
    echo '<div class="alert alert-danger">Etiket güncellenemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=etiket" />';

}