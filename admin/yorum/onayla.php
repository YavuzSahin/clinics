<?php
$yorum = $db->table('yorum')->where('id', $_GET['id'])->update(['onay'=>1, 'onaylanma_tarihi'=>date('Y-m-d H:i:s')]);
if($yorum){
?>
<div class="alert alert-success"><i class="fa fa-check"></i> Yorum Başarıyla Onaylandı.</div>
<?php }else{?>
<div class="alert alert-danger"><i class="fa fa-times"></i> Yorum Onayında Sorun Oluştu! Lütfen daha sonra yeniden deneyiniz.</div>
<?php } ?>