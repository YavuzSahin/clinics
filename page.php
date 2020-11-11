<?php require 'template/header.php';
?>
<div class="container clinics">
    <div class="page-breadcrumbs">
        <h1 class="section-title"><?=$pageInfo->baslik;?></h1>
        <div class="world-nav cat-menu">
            <ul class="list-inline">
                <li class="active"><a href="<?=$actual_link;?>"><?=$pageInfo->baslik;?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4 col-lg-3 float-left tr-sticky">
        <div id="sitebar" class="theiaStickySidebar">
                <div class="widget">
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
                    <h2 class="section-title title"><?=$site->baslik_ic;?></h2>
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
                                                <?=$city->sehir;?> saç ekimi merkezleri
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
                    <div class="left-content details-page">
                        <h3><span><?=$pageInfo->baslik;?></span></h3>
                        <div class="clinic-detail">
                            <?=$pageInfo->icerik;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'template/footer.php';?>
