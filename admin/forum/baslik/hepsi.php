<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Forum Başlıkları
            </header>
            <div class="card-body">
                <a href="forum.php?s=baslik&p=ekle" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni Forum Başlığı Ekle</a>
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="25%">Başlık</th>
                            <th width="25%" class="hidden-phone">Konu</th>
                            <th width="15%" class="hidden-phone">Yazar</th>
                            <th width="15%" class="hidden-phone">Güncellenme Tarihi</th>
                            <th width="10%">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $kategoriler = $db->table('forum_baslik')->getAll();
                            foreach ($kategoriler as $kategori){
                        ?>
                        <tr class="gradeX <?php if($kategori->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>" valign="middle">
                            <td valign="middle" class="hidden-phone <?php if($kategori->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$kategori->id;?></td>
                            <td valign="middle" class="<?php if($kategori->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$kategori->baslik;?>  <?php if($kategori->silinme_tarihi!=NULL){?> - Yayında Değil<?php } ?></td>
                            <td class="hidden-phone <?php if($kategori->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=forumKonu($kategori->konu_id);?></td>
                            <td class="hidden-phone <?php if($kategori->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=yazar($kategori->yazar)->kullanici;?></td>
                            <td class="center hidden-phone <?php if($kategori->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=date('d-m-Y H:i:s', strtotime($kategori->guncellenme_tarihi));?></td>
                            <td class="<?php if($kategori->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>">
                                    <a href="forum.php?s=baslik&p=duzenle&id=<?=$kategori->id;?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                <?php if($kategori->silinme_tarihi!=NULL){?>
                                    <a href="forum.php?s=baslik&p=yayinla&id=<?=$kategori->id;?>" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>
                                <?php }else {?>
                                    <a href="forum.php?s=baslik&p=kaldir&id=<?=$kategori->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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