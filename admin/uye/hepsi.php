<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Tüm Üyeler
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="20%">Kullanıcı Adı</th>
                            <th width="20%" class="hidden-phone">E-Posta Adresi</th>
                            <th width="8%" class="hidden-phone">Rütbe</th>
                            <th width="8%" class="hidden-phone">Aktif</th>
                            <th width="9%" class="hidden-phone">Yetki</th>
                            <th width="15%" class="hidden-phone">Üyelik Tarihi</th>
                            <th width="5%">İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $uyeler = $db->table('uye')->getAll();
                            foreach ($uyeler as $uye){
                        ?>
                        <tr class="gradeX <?php if($uye->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>" valign="middle">
                            <td valign="middle" class="hidden-phone <?php if($uye->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$uye->id;?></td>
                            <td valign="middle" class="<?php if($kategori->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$uye->kullanici;?>  <?php if($uye->silinme_tarihi!=NULL){?> - Banlı<?php } ?></td>
                            <td class="hidden-phone <?php if($uye->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=$uye->eposta;?></td>
                            <td class="hidden-phone <?php if($uye->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=uyeRutbe($uye->rutbe);?></td>
                            <td class="hidden-phone <?php if($uye->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=uyeAktif($uye->aktif);?></td>
                            <td class="hidden-phone <?php if($uye->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=uyeYetki($uye->yetki);?></td>
                            <td class="hidden-phone <?php if($uye->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>"><?=date('d-m-Y H:i:s', strtotime($uye->eklenme_tarihi));?></td>
                            <td class="center <?php if($uye->silinme_tarihi!=NULL){?>alert alert-danger<?php } ?>">
                                    <a href="uye.php?s=uye&p=duzenle&id=<?=$uye->id;?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
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