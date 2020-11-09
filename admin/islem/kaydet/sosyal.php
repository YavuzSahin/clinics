<?php
//veriler
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
$facebook      = $_POST['facebook'];
$instagram     = $_POST['instagram'];
$youtube       = $_POST['youtube'];
$linkedin      = $_POST['linkedin'];
$pinterest     = $_POST['pinterest'];
$medium        = $_POST['medium'];
$email         = $_POST['email'];

$data = [
    'facebook'=> $facebook,
    'instagram'=> $instagram,
    'youtube'=> $youtube,
    'linkedin'=> $linkedin,
    'pinterest'=> $pinterest,
    'medium'=> $medium,
    'email'=> $email
];

$save = $db->table('site')->where('id', 1)->update($data);
if($save){
    echo '<div class="alert alert-success">Sosyal medya bilgileri başarıyla güncellendi.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sosyal-ayarlar.php" />';

}else{
    echo '<div class="alert alert-danger">Sosyal medya bilgileri güncellenemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sosyal-ayarlar.php" />';

}