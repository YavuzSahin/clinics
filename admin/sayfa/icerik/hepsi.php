<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                İçerikler
            </header>
            <div class="card-body">
                <a href="sayfa.php?s=icerik&p=ekle" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus"></i> Yeni İçerik Ekle</a>
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="40%">İçerik Başlığı</th>
                            <th width="25%" class="hidden-phone">Kategori</th>
                            <th width="15%" class="hidden-phone">Güncellenme Tarihi</th>
                            <th width="10%">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $icerikler = $db->table('sayfa')->getAll();
                        foreach ($icerikler as $icerik){
                            ?>
                            <tr class="gradeX <?php if($icerik->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>" valign="middle">
                                <td valign="middle" class="hidden-phone <?php if($icerik->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$icerik->id;?></td>
                                <td valign="middle" class="<?php if($icerik->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$icerik->baslik;?>  <?php if($icerik->silinme_tarihi!=NULL){?> - Yayında Değil<?php } ?></td>
                                <td class="hidden-phone <?php if($icerik->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=kategoriAdiIcerik($icerik->kategori);?></td>
                                <td class="center hidden-phone <?php if($icerik->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=date('d-m-Y H:i:s', strtotime($icerik->guncellenme_tarihi));?></td>
                                <td class="<?php if($icerik->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>">
                                    <a href="sayfa.php?s=icerik&p=duzenle&id=<?=$icerik->id;?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                    <?php if($icerik->silinme_tarihi!=NULL){?>
                                        <a href="sayfa.php?s=icerik&p=yayinla&id=<?=$icerik->id;?>" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>
                                    <?php }else {?>
                                        <a href="sayfa.php?s=icerik&p=kaldir&id=<?=$icerik->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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