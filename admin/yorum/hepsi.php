<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Tüm Yorumlar
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">İsim ve Soyisim</th>
                            <th width="20%" class="hidden-phone ">E-Posta Adresi</th>
                            <th width="15%" class="hidden-phone">Yorum Tarihi</th>
                            <th width="15%" class="hidden-phone">Onay Tarihi</th>
                            <th width="15%">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $yorumlar = $db->table('yorum')->getAll();
                            foreach ($yorumlar as $yorum){
                        ?>
                        <tr class="gradeX <?php if($yorum->onaylanma_tarihi==NULL){?>alert alert-danger<?php } ?>" valign="middle">
                            <td valign="middle" class="hidden-phone <?php if($yorum->onaylanma_tarihi==NULL){?>alert alert-danger<?php } ?>"><?=$yorum->id;?></td>
                            <td class="<?php if($yorum->onaylanma_tarihi==NULL){?>alert alert-danger<?php } ?>"><?=$yorum->isim;?></td>
                            <td valign="middle" class="hidden-phone <?php if($yorum->onaylanma_tarihi==NULL){?>alert alert-danger<?php } ?>"><?=$yorum->eposta;?>  <?php if($yorum->onaylanma_tarihi==NULL){?> - Kaldırıldı<?php } ?></td>
                            <td class="hidden-phone <?php if($yorum->onaylanma_tarihi==NULL){?>alert alert-danger<?php } ?>"><?=date('d-m-Y H:i:s', strtotime($yorum->eklenme_tarihi));?></td>
                            <td class="hidden-phone <?php if($yorum->onaylanma_tarihi==NULL){?>alert alert-danger<?php } ?>"><?=date('d-m-Y H:i:s', strtotime($yorum->onaylanma_tarihi));?></td>
                            <td class="center <?php if($yorum->onaylanma_tarihi==NULL){?>alert alert-danger<?php } ?>">
                                    <a href="yorum.php?s=yorum&p=onayla&id=<?=$yorum->id;?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                    <a href="yorum.php?s=yorum&p=kaldir&id=<?=$yorum->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6"><?=$yorum->yorum;?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </section>

    </div>
</div>