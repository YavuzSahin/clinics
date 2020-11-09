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
            <?php
                if($pageInfo->plaka==99){
            ?>
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
            </div>
            <?php }else{?>
                    <div class="widget">
                        <h2 class="section-title title">İlçelere Göre</h2>
                        <h3>Saç Ekimi Merkezleri</h3>
                        <ul class="post-list">
                            <?php
                            $cities = $db->table('ilce')->where('sehirID', $pageInfo->id)->orderBy('id', 'ASC')->getAll();
                            foreach ($cities as $city){
                                ?>
                                <li>
                                    <div class="post small-post">
                                        <div class="post-content-two">
                                            <h3 class="entry-title">
                                                <i class="fa fa-angle-right"></i>
                                                <a href="<?=$site->url;?>/<?=seoUrl($city->ilce.'-sac-ekimi-merkezleri')?>.html">
                                                    <?=$city->ilce;?> saç ekimi
                                                </a>
                                            </h3>
                                        </div>
                                    </div><!--/post-->
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
            <?php }?>
        </div>
    </div>
    <div class="col-md-8 col-lg-9 float-right">
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
                                <div class="col-md-4 col-sm-6 img float-left">
                                    <img itemprop="image" class="img-fluid" src="<?=$site->cdnurl;?>/upload/resized/<?=$clinic->logo;?>" width="871" height="497" alt="<?=$clinic->baslik;?>" />
                                </div>
                                <div class="col-md-8 col-sm-6 info float-right">
                                    <h3>
                                        <a href="<?=$site->url;?>/sac-ekimi-merkezi/<?=$clinic->url;?>.html"><?=$clinic->baslik;?></a>
                                        <?php if($clinic->sponsorlu==1){?><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><?php } ?>
                                    </h3>
                                    <p><?=substr(strip_tags($clinic->hakkinda), 0, 255);?></p>
                                    <p><i class="fas fa-map-marker-alt"></i> <?=sehir($clinic->city);?> | <?=ilce($clinic->district);?></p>
                                    <div class="btn-group">
                                        <div class="btn btn-success"><i class="fas fa-phone-volume"></i> Telefon</div>
                                        <div class="btn btn-warning"><i class="fas fa-envelope-open-text"></i> E-Mail Gönder</div>
                                        <div class="btn btn-info"><i class="fas fa-money-bill-wave"></i> Fiyat Talep Et</div>
                                    </div>
                                </div>
                            </li>
                        <?php }
                        foreach ($clinicsN as $clinic){
                            ?>
                            <li class="list-clinic <?php if($clinic->sponsorlu==1){?>sponsorlu<?php } ?>">
                                <div class="col-md-4 col-sm-6 img float-left">
                                    <img itemprop="image" class="img-fluid" src="<?=$site->cdnurl;?>/upload/resized/<?=$clinic->logo;?>" width="871" height="497" alt="<?=$clinic->baslik;?>" />
                                </div>
                                <div class="col-md-8 col-sm-6 info float-right">
                                    <h3>
                                        <a href="<?=$site->url;?>/sac-ekimi-merkezi/<?=$clinic->url;?>.html"><?=$clinic->baslik;?></a>
                                        <?php if($clinic->sponsorlu==1){?><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><?php } ?>
                                    </h3>
                                    <p><?=substr(strip_tags($clinic->hakkinda), 0, 255);?></p>
                                    <p><i class="fas fa-map-marker-alt"></i> <?=sehir($clinic->city);?> | <?=ilce($clinic->district);?></p>
                                    <div class="btn-group">
                                        <div class="btn btn-success"><i class="fas fa-phone-volume"></i> Telefon</div>
                                        <div class="btn btn-warning"><i class="fas fa-envelope-open-text"></i> E-Mail Gönder</div>
                                        <div class="btn btn-info"><i class="fas fa-money-bill-wave"></i> Fiyat Talep Et</div>
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
