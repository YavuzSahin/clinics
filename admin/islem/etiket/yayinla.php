<?php
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
$id = $_POST['id'];
$save = $db->table('etiket')->where('id', $id)->update(['silinme_tarihi'=>NULL]);
if($save){
    echo '<div class="alert alert-success">Etiket başarıyla yayınlandı.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=etiket" />';

}else{
    echo '<div class="alert alert-danger">Etiket yayınlanamadı. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=etiket" />';

}