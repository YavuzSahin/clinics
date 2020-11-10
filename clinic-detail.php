<?php require 'template/header.php';
?>
<div class="container clinics">
    <div class="page-breadcrumbs">
        <h1 class="section-title"><?=$siteBaslikic;?></h1>
        <div class="world-nav cat-menu">
            <ul class="list-inline">
                <li class="active"><a href="<?=$actual_link;?>"><?=$siteBaslikic;?></a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-4 col-lg-3 float-left tr-sticky">
        <div id="sitebar" class="theiaStickySidebar">
                <div class="widget">
                    <h2 class="section-title title"><?=$siteBaslikic;?></h2>
                    <h3>Saç Ekimi Merkezi</h3>
                    <div class="col logo text-center">
                        <img itemprop="image" class="img-fluid" src="<?=$site->cdnurl;?>/upload/resized/<?=$clinic->logo;?>" width="871" height="497" alt="<?=$clinic->baslik;?>" />
                    </div>
                    <div class="col details">
                        <p><?=$siteAciklama;?></p>
                    </div>
                    <div class="btn-group">
                        <div class="btn btn-success"><a href="<?=$site->url;?>/outlink/phone/<?=$pageInfo->id;?>" target="_blank"><i class="fas fa-phone-volume"></i> Telefon ile Ulaş</a></div>
                        <div class="btn btn-warning"><a href="<?=$site->url;?>/outlink/whatsapp/<?=$pageInfo->id;?>" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp ile Ulaş</a></div>
                        <div class="btn btn-info"><a href="<?=$site->url;?>/outlink/whatsapp/<?=$pageInfo->id;?>" target="_blank"><i class="fas fa-money-bill-wave"></i> Fiyat Talep Et</a></div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-8 col-lg-9 float-right listdiv">
        <div id="site-content" class="site-content">
            <div class="row">
                <div class="col">
                    <div class="left-content details-page">
                        <h3><span><?=$siteBaslikic;?></span> Hakkında</h3>
                        <div class="clinic-detail"><?=$pageInfo->hakkinda;?></div>
                        <h3><span><?=$siteBaslikic;?></span> Yorumları</h3>
                        <div class="clinic-detail"><?=$pageInfo->hakkinda;?></div>
                        <h3><span><?=$siteBaslikic;?></span> Şikayetleri</h3>
                        <div class="clinic-detail"><?=$pageInfo->hakkinda;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'template/footer.php';?>
