<?php require 'template/header.php';
?>
<div class="container clinics">
    <div class="page-breadcrumbs">
        <h1 class="section-title"><?=$siteBaslikic;?></h1>
        <p><?=$siteAciklama;?></p>
        <div class="world-nav cat-menu">
            <ul class="list-inline">
                <li class="active"><a href="<?=$actual_link;?>"><?=$siteBaslikic;?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4 col-lg-3 float-left tr-sticky">
        <div id="sitebar" class="theiaStickySidebar">
            <div class="widget">
                <h2 class="section-title title">İllere Göre</h2>
                <h3>Saç Ekimi Merkezleri</h3>
                <ul class="post-list">
                    <?php
                    $cities = $db->table('sehir')->orderBy('id', 'ASC')->getAll();
                    foreach ($cities as $city){
                        ?>
                        <li>
                            <div class="post small-post">
                                <div class="post-content-two">
                                    <h3 class="entry-title">
                                        <i class="fa fa-angle-right"></i>
                                        <a href="<?=$site->url;?>/<?=seoUrl($city->sehir.'-sac-ekimi-merkezleri')?>.html">
                                            <?=$city->sehir;?> saç ekimi
                                        </a>
                                    </h3>
                                </div>
                            </div><!--/post-->
                        </li>
                    <?php } ?>
                </ul>
                <h2 class="section-title title">Saç Ekimi</h2>
                <h3>Bilgilendirme</h3>
                <ul class="post-list">
                    <?php
                    $categories = $db->table('kategori')->orderBy('id', 'ASC')->getAll();
                    foreach ($categories as $category){
                        ?>
                        <li>
                            <div class="post small-post">
                                <div class="post-content-two">
                                    <h3 class="entry-title">
                                        <i class="fa fa-angle-right"></i>
                                        <a href="<?=$site->url;?>/<?=kategoriUrl($category->id)?>">
                                            <?=$category->baslik;?>
                                        </a>
                                    </h3>
                                </div>
                            </div><!--/post-->
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-lg-9 float-right listdiv">
        <div id="site-content" class="site-content">
            <div class="row">
                <div class="col">
                    <div class="left-content">
                        <?php
                        $clinics    = $db->table('merkez')->where('sponsorlu', 1)->getAll();
                        foreach ($clinics as $cli){$ids[] = $cli->id;}
                        if($pageInfo->plaka==99) {
                            $clinicsN = $db->table('merkez')->notIn('id', $ids)->getAll();
                        }else{
                            $clinicsN = $db->table('merkez')->notIn('id', $ids)->where('city', $pageInfo->plaka)->getAll();
                        }
                        $count      = count($clinics)+count($clinicsN);
                        ?>
                        <h3>Ön Plana Çıkan <u><b><?=$count;?></b></u> <span><?=$siteBaslikic;?></span></h3>
                    </div>
                    <ul class="list-clinics">
                        <?php
                        foreach ($clinics as $clinic){
                            ?>
                            <li class="list-clinic <?php if($clinic->sponsorlu==1){?>sponsorlu<?php } ?>">
                                <div class="col-md-2 col-sm-6 img float-left imgback">
                                    <img itemprop="image" class="img-fluid" src="<?=$site->url;?>/upload/logo/<?=$clinic->logo;?>" width="871" height="497" alt="<?=$clinic->baslik;?>" />
                                </div>
                                <div class="col-md-10 col-sm-6 info float-right">
                                    <h3>
                                        <a href="<?=$site->url;?>/sac-ekimi-merkezi/<?=$clinic->url;?>.html"><?=$clinic->baslik;?></a>
                                        <?php if($clinic->sponsorlu==1){?><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><?php } ?>
                                    </h3>
                                    <p><?=substr(strip_tags($clinic->aciklama), 0, 255);?></p>
                                    <p class="location"><i class="fas fa-map-marker-alt"></i> <?=sehir($clinic->city);?> | <?=ilce($clinic->district);?></p>
                                    <div class="btn-group">
                                        <div class="btn btn-success"><a href="<?=$site->url;?>/outlink/phone/<?=$pageInfo->id;?>" target="_blank"><i class="fas fa-phone-volume"></i> Telefon</a></div>
                                        <div class="btn btn-warning"><a href="<?=$site->url;?>/outlink/whatsapp/<?=$pageInfo->id;?>" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp ile Ulaş</a></div>
                                        <div class="btn btn-info"><a href="<?=$site->url;?>/outlink/whatsapp/<?=$pageInfo->id;?>" target="_blank"><i class="fas fa-money-bill-wave"></i> Fiyat Talep Et</a></div>
                                    </div>
                                </div>
                            </li>
                        <?php }
                        foreach ($clinicsN as $clinic){
                            ?>
                            <li class="list-clinic <?php if($clinic->sponsorlu==1){?>sponsorlu<?php } ?>">
                                <div class="col-md-2 col-sm-6 img float-left imgback">
                                    <img itemprop="image" class="img-fluid" src="<?=$site->url;?>/upload/logo/<?=$clinic->logo;?>" width="871" height="497" alt="<?=$clinic->baslik;?>" />
                                </div>
                                <div class="col-md-10 col-sm-6 info float-right">
                                    <h3>
                                        <a href="<?=$site->url;?>/sac-ekimi-merkezi/<?=$clinic->url;?>.html"><?=$clinic->baslik;?></a>
                                        <?php if($clinic->sponsorlu==1){?><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><?php } ?>
                                    </h3>
                                    <p><?=substr(strip_tags($clinic->aciklama), 0, 255);?></p>
                                    <p class="location"><i class="fas fa-map-marker-alt"></i> <?=sehir($clinic->city);?> | <?=ilce($clinic->district);?></p>
                                    <div class="btn-group">
                                        <div class="btn btn-success"><a href="<?=$site->url;?>/outlink/phone/<?=$pageInfo->id;?>" target="_blank"><i class="fas fa-phone-volume"></i> Telefon</a></div>
                                        <div class="btn btn-warning"><a href="<?=$site->url;?>/outlink/whatsapp/<?=$pageInfo->id;?>" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp ile Ulaş</a></div>
                                        <div class="btn btn-info"><a href="<?=$site->url;?>/outlink/whatsapp/<?=$pageInfo->id;?>" target="_blank"><i class="fas fa-money-bill-wave"></i> Fiyat Talep Et</a></div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'template/footer.php';?>
