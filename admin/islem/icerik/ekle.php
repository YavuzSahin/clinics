<?php
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
include_once '../controller/function.php';
use Intervention\Image\ImageManagerStatic as Image;

$baslik         = $_POST['baslik'];
$baslik_ic      = $_POST['baslik_ic'];
$url            = $_POST['url'];
$aciklama       = $_POST['aciklama'];
$kategori      = $_POST['kategori'];
$etikets        = $_POST['etiket'];
$icerik         = $_POST['icerik'];

/*
$kategori = '';
foreach ($kategoris as $selectedOption1){
    $kategori.= $selectedOption1.", ";
}
$kategori = rtrim($kategori, ', ');
*/
$etiket = '';
foreach ($etikets as $selectedOption2){
    $etiket.= $selectedOption2.", ";
}
$etiket = rtrim($etiket, ', ');





$img    = Image::make($_FILES['image']['tmp_name']);
$mime   = $img->mime();
if($mime='image/jpeg'){$mimT = 'jpg';}elseif ($mime=='image/png'){$mimT='png';}elseif ($mime=='image/gif'){$mimT='gif';}else{$mimT='jpg';}
$name   = seoUrl($baslik).'_img_'.rand(9999,999999).'.'.$mimT;
$img->save('../upload/original/'.$name);
$img->resize(825, null, function ($constraint) {
    $constraint->aspectRatio();
});
$img->save('../upload/resized/'.$name);

$checkUrl = $db->table('sayfa')->where('url', $url)->get();
if(isset($checkUrl->id)){
    $url = $url.'-'.substr(time(), 7, 5);
}


$data = [
    'baslik'=>$baslik,
    'baslik_ic'=>$baslik_ic,
    'url'=>$url,
    'aciklama'=>$aciklama,
    'kategori'=>$kategori,
    'etiketler'=>$etiket,
    'icerik'=>$icerik,
    'resim'=>$name,
    'okunma'=>0,
    'sabit'=>null,
    'slider'=>null,
    'sponsorlu'=>null,
    'anasayfa'=>null,
    'yazar'=>$_SESSION['blogs_admin'],
    'eklenme_tarihi'=>date('Y-m-d H:i:s'),
    'guncellenme_tarihi'=>date('Y-m-d H:i:s')
];

$save = $db->table('sayfa')->insert($data);
if($save){
    echo '<div class="alert alert-success">Sayfa başarıyla eklendi.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=icerik&p=ekle" />';
}else{
    echo '<div class="alert alert-danger">Sayfa eklenemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=icerik&p=ekle" />';
}
