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
                        <img itemprop="image" class="img-fluid" src="<?=$site->url;?>/upload/logo/<?=$pageInfo->logo;?>" width="871" height="497" alt="<?=$clinic->baslik;?>" />
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
                        <div class="clinic-detail">
                            <?=$pageInfo->hakkinda;?>
                            <p><strong><?=sehir($pageInfo->city);?></strong> saç ekim merkezleri arasında faaliyet gösteren <?=$siteBaslikic;?>, FUE Saç Ekimi ve DHI Saç Ekimi gibi saç ekimi çözümlerini saç ekimi hastalarına özel alternatif sunarak saç ekimi operasyonlarını gerçekleştirmektedir.<br>
                                Saç ekimi alanında, mükemmel saç ekimi sonucu başarılara imza atan <?=$siteBaslikic;?>, uzman kadrosu ile ihtiyaçları analiz ederek, en hızlı, uygun ve kaliteli hizmet politikası ile saç ekimi hastalarına hizmet vermektedir.<br>
                                Uzun yıllara dayanan tecrübesiyle, saç ekimi teknolojilerini ve gelişmelerini yakından takip ederek, hastalarına en uygun saç ekimi yöntemlerini sunmayı hedeflemektedir.<br>
                                Yurtiçinden ve yurtdışından geniş bir kitleye hitap eden <?=$siteBaslikic;?> günden güne saç ekimi başarısını arttırmaktadır.<br>
                                Türkiye’de tüm şehirlerimizden, yurtdışından ise genellikle Avrupadan; İngiltere, Almanya, Hollanda, Belçika, Fransa, İrlanda, İsveç ve İsviçreden yoğunlukta gelmekteyken, Arap ülkelerinden; Suudi Arabistan, Dubai (Birleşik Arap Emirlikleri), Katar, Kuveyt, Libya, Mısır ve Irak gibi başlıca ülkelerden sıkça gelmektedir.<br>
                                Saç ekimi yaptıran hastaların memnuniyet oranı bir hayli yüksek olan <?=$siteBaslikic;?> saç ekimi işlemi sonrasında da hastalarına gereken tüm hizmetleri vermektedir.<br>
                                <strong>Saç ekimi <?=sehir($pageInfo->city);?></strong> denince akla ilk gelen merkezlerden biri olan <?=$siteBaslikic;?> saç ekimi konusundaki çalışmalarını özenle devam ettirmektedir.<br>
                                <a href="<?=$site->url;?>" title="saç ekimi merkezleri">Saç ekimi merkezleri</a> hakkında bilgi almak istiyorsanız, <?=$site->baslik_ic;?> sitemizi takip etmeye devam edebilirsiniz..</p>
                        </div>
                        <h3><span><?=$siteBaslikic;?></span> Yorumları</h3>
                        <div class="clinic-detail-slider">
                            <div class="slick-content yorum">
                                <?php
                                    $comments = $db->table('yorum')->where('merkezid', $pageInfo->id)->where('onay', 1)->where('type', 1)->getAll();
                                    foreach ($comments as $comment){
                                ?>
                                <div class="item">
                                    <div class="comments">
                                        <p><strong><i class="fa fa-user"></i> <?=$comment->isim;?></strong> demiş ki;</p>
                                        <p class="comment-inside"><?=$comment->yorum;?></p>
                                        <small><i class="fa fa-clock-o"></i> <?php echo iconv('latin5','utf-8',strftime(' %d %B %Y, %A ',strtotime($comment->eklenme_tarihi)));?></small>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <h3><span><?=$siteBaslikic;?></span> Şikayetleri</h3>
                        <div class="clinic-detail-slider">
                            <div class="slick-content sikayetn">
                                <?php
                                $comments = $db->table('yorum')->where('merkezid', $pageInfo->id)->where('onay', 1)->where('type', 2)->getAll();
                                if(count((array) $comments)>=1){
                                foreach ($comments as $comment){
                                    ?>
                                    <div class="item">
                                        <div class="comments">
                                            <p><strong><i class="fa fa-user"></i> <?=$comment->isim;?></strong> demiş ki;</p>
                                            <p class="comment-inside"><?=$comment->yorum;?></p>
                                            <small><i class="fa fa-clock-o"></i> <?php echo iconv('latin5','utf-8',strftime(' %d %B %Y, %A ',strtotime($comment->eklenme_tarihi)));?></small>
                                        </div>
                                    </div>
                                <?php } }else{ ?>
                                    <div class="alert alert-success col-md-12"><?=$siteBaslikic;?> hakkında hiç şikayet bulunamadı!</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'template/footer.php';?>
