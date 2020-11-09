<?php
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
$id = $_POST['id'];
$save = $db->table('etiket')->where('id', $id)->update(['silinme_tarihi'=>date('Y-m-d H:i:s')]);
if($save){
    echo '<div class="alert alert-success">Etiket başarıyla silindi.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=etiket" />';

}else{
    echo '<div class="alert alert-danger">Etiket silinemedi. Lütfen daha sonra yeniden deneyiniz.</div>';
    echo '<meta http-equiv="refresh" content="3;URL=sayfa.php?s=etiket" />';

}