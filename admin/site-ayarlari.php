<?php
session_start();
if(!$_SESSION['blogs_admin'] && !$_SESSION['blogs_id']){
    header('location: login.php');
}
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="blog sistemi, saç ekimi için kamuoyu bilgilendirme oluşturur.">
    <meta name="author" content="blog sistemi">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>blog sistemi yönetim</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="css/slidebars.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo">Blog <span>Sistemi</span></a>
        <!--logo end-->
        <div class="nav notify-row pull-right" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning">1</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow">1 Adet Bildiriminiz Var!</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                Server #3 overloaded.
                                <span class="small italic">34 mins</span>
                            </a>
                        </li>
                        <li>
                            <a href="bildirim.php">Tüm Bildirimler</a>
                        </li>
                    </ul>
                </li>
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge badge-danger">1</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red">1 Adet Mesajınız Var!</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                            </a>
                        </li>

                        <li>
                            <a href="mesaj.php">Tüm Mesajlar</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php
            $admin = $db->table('uye')->where('id', $_SESSION['blogs_admin'])->get();
        ?>
        <div class="top-nav ">
            <ul class="nav pull-right top-menu">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="img/avatar1_small.jpg">
                        <span class="username"><?=$admin->isim;?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout dropdown-menu-right">
                        <div class="log-arrow-up"></div>
                        <li><a href="profil.php"><i class=" fa fa-suitcase"></i>Profilim</a></li>
                        <li><a href="ayar.php"><i class="fa fa-cog"></i> Ayarlar</a></li>
                        <li><a href="bildirim.php"><i class="fa fa-bell-o"></i> Bildirimler</a></li>
                        <li><a href="logout.php"><i class="fa fa-key"></i> Güvenli Çıkış</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <?php include_once 'sidebars/admin-sidebar.php'; ?>
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="card">
                        <header class="card-header">
                            Site Ayarları
                        </header>
                        <div class="card-body">
                            <?php
                                $site = $db->table('site')->where('id' ,1)->get();
                                if(isset($_GET['is']) && isset($_GET['sayfa'])){
                                    include_once 'islem/'.$_GET['is'].'/'.$_GET['sayfa'].'.php';
                                }
                            ?>
                            <form action="?is=kaydet&sayfa=site" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="baslik">Site Başlığı</label>
                                    <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Site Başlığı" value="<?=$site->baslik;?>">
                                    <small id="baslikYardim" class="form-text text-muted">site başlığı açılış sayfasında sitenin görünmesini istediğiniz başlık bölümüdür.</small>
                                </div>
                                <div class="form-group">
                                    <label for="baslik-ic">Site Başlığı iç sayfalar için</label>
                                    <input type="text" class="form-control" id="baslik-ic" name="baslik_ic" aria-describedby="baslikYardim" placeholder="Site Başlığı" value="<?=$site->baslik_ic;?>">
                                    <small id="baslikYardim" class="form-text text-muted">site başlığı iç sayfalara eklenecek olan başlığın görünmesini istediğiniz bölümüdür.</small>
                                </div>
                                <div class="form-group">
                                    <label for="aciklama">Site Açıklaması</label>
                                    <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="Site Açıklaması" value="<?=$site->aciklama;?>">
                                    <small id="aciklamaYardim" class="form-text text-muted">site açıklaması google ve diğer arama motorlarında görünecek açıklama bölümüdür.</small>
                                </div>
                                <div class="form-group">
                                    <label for="kelime">Site Kelimeleri</label>
                                    <input type="text" class="form-control" id="kelime" name="kelime" aria-describedby="kelimeYardim" placeholder="Site Kelimeleri" value="<?=$site->kelime;?>">
                                    <small id="kelimeYardim" class="form-text text-muted">site kelimeleri sitenin arama motorlarına bildirilmesini istediğiniz kelimeleridir.</small>
                                </div>
                                <div class="form-group">
                                    <label for="adres">Site Adresi</label>
                                    <input type="text" class="form-control" id="adres" name="adres" aria-describedby="adresYardim" placeholder="Site Adresi" value="<?=$site->url;?>">
                                    <small id="adresYardim" class="form-text text-muted">site adresi sitenin hangi domain üzerinde çalışacağını ayarlayan kısımdır.</small>
                                </div>
                                <div class="form-group">
                                    <label for="cdn">Site CDN Url</label>
                                    <input type="text" class="form-control" id="cdn" name="cdn" aria-describedby="cdnYardim" placeholder="Site CDN Url" value="<?=$site->cdnurl;?>">
                                    <small id="cdnYardim" class="form-text text-muted">site cdn adresi sitenin statik dosyalarının hangi domainden alınacağını ayarlayan kısımdır.</small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Ayarları Kaydet</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </section>

                </div>
            </div>
        </section>
    </section>

    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2019 &copy; blog sistemi
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>
<script src="js/respond.min.js" ></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="js/common-scripts.js?v=2"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/count.js"></script>

<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    $(window).on("resize",function(){
        var owl = $("#owl-demo").data("owlCarousel");
        owl.reinit();
    });

</script>

</body>
</html>
