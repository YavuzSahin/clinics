<?php
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
include_once '../controller/function.php';
use Intervention\Image\ImageManagerStatic as Image;

$baslik         = $_POST['baslik'];
$url            = $_POST['url'];
$aciklama       = $_POST['aciklama'];
$kategori       = $_POST['kategori'];
$etikets        = $_POST['etiket'];
$icerik         = $_POST['icerik'];

$telefon        = $_POST['telefon'];
$telefon1       = $_POST['telefon1'];
$whatsapp       = $_POST['whatsapp'];
$website        = $_POST['website'];
$facebook       = $_POST['facebook'];
$instagram      = $_POST['instagram'];
$minfiyat       = $_POST['minfiyat'];
$maxfiyat       = $_POST['maxfiyat'];


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

if(isset($_POST['sponsorlu']) && $_POST['sponsorlu']==1){$sponsorlu = 1;}else{$sponsorlu=0;}





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
    'url'=>$url,
    'aciklama'=>$aciklama,
    'kategori'=>$kategori,
    'etiketler'=>$etiket,
    'hakkinda'=>$icerik,
    'logo'=>$name,
    'okunma'=>0,
    'sponsorlu'=>$sponsorlu,
    'eklenme_tarihi'=>date('Y-m-d H:i:s'),
    'guncellenme_tarihi'=>date('Y-m-d H:i:s'),
    'telefon'        => $telefon,
    'telefon1'       => $telefon1,
    'whatsapp'       => $whatsapp,
    'website'        => $website,
    'facebook'       => $facebook,
    'instagram'      => $instagram,
    'fiyat_min'       => $minfiyat,
    'fiyat_max'       => $maxfiyat
];

$save = $db->table('merkez')->insert($data);
if($save){
    echo '<div class="alert alert-success">Saç Ekimi Merkezi başarıyla eklendi.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=merkez.php?p=ekle" />';
}else{
    echo '<div class="alert alert-danger">Saç Ekimi Merkezi eklenemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=merkez.php?p=ekle" />';
}
