<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                İçerik Etiketleri
            </header>
            <div class="card-body">
                <a href="sayfa.php?s=etiket&p=ekle" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Etiket Ekle</a>
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="40%">Etiket Başlığı</th>
                            <th width="25%" class="hidden-phone">Etiket Linki</th>
                            <th width="15%" class="hidden-phone">Güncellenme Tarihi</th>
                            <th width="10%">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $etiketler = $db->table('etiket')->getAll();
                            foreach ($etiketler as $etiket){
                        ?>
                        <tr class="gradeX <?php if($etiket->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>" valign="middle">
                            <td valign="middle" class="hidden-phone <?php if($etiket->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$etiket->id;?></td>
                            <td valign="middle" class="<?php if($etiket->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$etiket->baslik;?>  <?php if($etiket->silinme_tarihi!=NULL){?> - Yayında Değil<?php } ?></td>
                            <td class="hidden-phone <?php if($etiket->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$etiket->url;?></td>
                            <td class="center hidden-phone <?php if($etiket->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=date('d-m-Y H:i:s', strtotime($etiket->guncellenme_tarihi));?></td>
                            <td class="<?php if($etiket->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>">
                                    <a href="sayfa.php?s=etiket&p=duzenle&id=<?=$etiket->id;?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                <?php if($etiket->silinme_tarihi!=NULL){?>
                                    <a href="sayfa.php?s=etiket&p=yayinla&id=<?=$etiket->id;?>" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>
                                <?php }else {?>
                                    <a href="sayfa.php?s=etiket&p=kaldir&id=<?=$etiket->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </section>

    </div>
</div>