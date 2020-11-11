<?php
session_start();
if(!$_SESSION['blogs_admin'] && !$_SESSION['blogs_id']){
    header('location: login.php');
}
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
include_once '../controller/function.php';
include_once 'simple_html_dom.php';
$site = $db->table('site')->where('id', 1)->get();
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

    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />


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
                        <header class="card-header">Otomatik Klinik Ekleme İşlemi</header>
                        <div class="card-body">
                            <?php
                                if(isset($_GET['sehirID'])){
                                    $sehir = $_GET['sehirID'];
                                    if($sehir=34){
                                        $url    = 'istanbul';
                                        $sehir  = 34;
                                    }elseif($sehir=35){
                                        $url    = 'izmir';
                                        $sehir  = 35;
                                    }elseif($sehir=6){
                                        $url    = 'ankara';
                                        $sehir  = 6;
                                    }elseif($sehir=7){
                                        $url    = 'antalya';
                                        $sehir  = 7;
                                    }
                                    echo '<b>https://www.sacekimiburada.com/'.$url.'-sac-ekim-merkezleri</b> için çalışıyorum.<br>';
                                    $html = file_get_html('https://www.sacekimiburada.com/'.$url.'-sac-ekim-merkezleri');
                                    foreach($html->find('#sideItemRf .pr-item') as $element){
                                        $name   = $element->find('h3', 0)->plaintext;
                                        $url    = seoUrl(strip_tags($element->find('h3', 0)->plaintext));
                                        $logo   = str_replace('/thumb/', '/', "https://www.sacekimiburada.com".$element->find('img', 0)->src);

                                        copy($logo, '../upload/logo/'.$url.".jpg");

                                        $data = [
                                                'baslik'                => $name,
                                                'url'                   => $url,
                                                'aciklama'              => $name.', hakkındaki '.$site->baslik_ic.' profilidir. '.$name.' hakkındaki '.$name.' fiyatları, '.$name.' yorumları ve '.$name.' şikayetlerine ulaşabilirsiniz.',
                                                'city'                  => $sehir,
                                                'logo'                  => $url.'.jpg',
                                                'eklenme_tarihi'        => date('Y-m-d H:i:s'),
                                                'guncellenme_tarihi'    => date('Y-m-d H:i:s'),
                                        ];

                                       // $a = $db->table('merkez')->insert($data);
                                        $a =1;
                                        if($a) {
                                            echo $name . " başarıyla eklendi";
                                        }else{
                                            echo $name . " eklenemedi.";
                                        }
                                        echo "<br><hr>";
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label for="kelime">İl Seçiniz</label>
                                <select class="js-example-basic-single" id="sehir" name="sehir">
                                        <option value="0">Şehir Seçiniz</option>
                                        <option value="34" data-select2-id="40">İstanbul</option>
                                        <option value="6" data-select2-id="41">Ankara</option>
                                        <option value="35" data-select2-id="42">İzmir</option>
                                        <option value="7" data-select2-id="43">Antalya</option>
                                </select>
                            </div>
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
<<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
<script src="js/respond.min.js" ></script>

<!--right slidebar-->
<script src="js/slidebars.min.js"></script>

<!--dynamic table initialization -->
<script src="js/dynamic_table_init.js"></script>
<script type="text/javascript" src="assets/select2/js/select2.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="js/ga.js"></script>
<script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script src="js/form-component.js"></script>
<script src="js/advanced-form-components.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $(".js-example-basic-single").select2();
        $(".js-example-basic-multiple").select2();

        $('#sehir').change(function () {
            location.href = '?sehirID='+$('#sehir').val();
        });
    });
</script>
</body>
</html>
