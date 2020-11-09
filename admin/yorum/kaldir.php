<?php
$yorum = $db->table('yorum')->where('id', $_GET['id'])->update(['onay'=>0, 'onaylanma_tarihi'=>NULL]);
if($yorum){
?>
<div class="alert alert-success"><i class="fa fa-check"></i> Yorum Başarıyla Kaldırıldı.</div>
<?php }else{?>
<div class="alert alert-danger"><i class="fa fa-times"></i> Yorum Kaldırılırken Sorun Oluştu! Lütfen daha sonra yeniden deneyiniz.</div>
<?php } ?>