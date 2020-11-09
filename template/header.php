<?php
ob_start();
require_once 'vendor/autoload.php';
require_once 'controller/database.php';
require_once 'controller/function-forsite.php';
use MatthiasMullie\Minify;
ini_set('mbstring.language','Turkish');
setlocale(LC_TIME, "Turkish"); //ba?ka bir dil içinse burada belirteceksin.
setlocale(LC_ALL,'Turkish'); //ba?ka bir dil içinse burada belirteceksin.
setlocale(LC_MONETARY, 'tr_TR');

$site = $db->table('site')->where('id', 1)->get();
$page = basename($_SERVER['SCRIPT_FILENAME'], '.php');
$actual_link        = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link_amp    = "https://$_SERVER[HTTP_HOST]/amp$_SERVER[REQUEST_URI]";
if($actual_link==$site->url.'/index.html'){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$site->url);
    exit();
}
if($page=='index'){
    $siteBaslik     = $site->baslik;
    $siteBaslikic   = $site->baslik_ic;
    $siteAciklama   = $site->aciklama;
    $siteKelime     = $site->kelime;
}elseif($page=='page'){
    if($_GET['url']=='index.html'){header('location:'.$site->url.'/index.html');exit();}
    $pageInfo = $db->table('sayfa')->where('url', $_GET['url'])->get();
    if(empty($pageInfo->id)){header('location:'.$site->url.'/error.html');}
    $db->table('sayfa')->where('id', $pageInfo->id)->update(['okunma'=>$pageInfo->okunma+1]);
    $siteBaslik     = $pageInfo->baslik." - ".$site->baslik_ic;
    $siteAciklama   = $pageInfo->aciklama;
    $siteKelime     = $site->kelime;
}elseif ($page=='city'){
    $pageInfo = $db->table('sehir')->where('url', $_GET['url'])->get();
    $siteBaslik     = $pageInfo->sehir." saç ekimi merkezleri - ".$site->baslik_ic;
    $siteBaslikic   = $pageInfo->sehir." saç ekimi merkezleri";
    $siteAciklama   = $pageInfo->sehir." saç ekimi merkezleri, ".$pageInfo->sehir." saç ekimi merkezlerinin listelendiği, saç ekimi bilgi, saç ekimi şikayet ve saç ekimi yorumların yer aldığı listelemedir.";
    $siteKelime     = $site->kelime;
}elseif ($page=='tags'){
    $pageInfo = $db->table('etiket')->where('url', $_GET['url'])->get();
    $siteBaslik     = $pageInfo->baslik." etiketi - ".$site->baslik_ic;
    $siteAciklama   = $pageInfo->aciklama;
    $siteKelime     = $site->kelime;
}elseif ($page=='error'){
    header('HTTP/1.0 404 Not Found');
    $siteBaslik     = "Sayfa Bulunamadı - ".$site->baslik_ic;
    $siteAciklama   = 'aradığınız sayfa saç ekimi forum sunucularımızda bulunamadı. lütfen bağlantınızı kontrol edin.';
    $siteKelime     = $site->kelime;
}
ob_start('compress_page');
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <link rel="canonical" href="<?=$actual_link;?>"/>
    <link rel="amphtml" href="<?=$actual_link_amp;?>">
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="description" content="<?=$siteAciklama;?>">
    <meta name="author" content="<?=$site->baslik_ic;?>">
    <title><?=$siteBaslik;?></title>
    <!-- Mobile Specific Metas
    ================================================== -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Favicon-->
    <link rel="shortcut icon" href="<?=$site->cdnurl;?>/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?=$site->cdnurl;?>/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?=$site->cdnurl;?>/css/main.css">
    <link rel="stylesheet" href="<?=$site->cdnurl;?>/css/clinics.css">
</head>
<body>
<div id="main-wrapper" class="homepage" style="transform: none;">
    <header id="navigation">
        <div class="navbar navbar-expand-lg" role="banner">
            <div class="container">
                <a class="secondary-logo" href="<?=$site->url;?>/"><span class="color">Saç ekimi</span> merkezi</a>
            </div>
            <div class="topbar">
                <div class="container">
                    <div id="topbar" class="navbar-header">
                        <a class="navbar-brand" href="<?=$site->url;?>/"><span class="color">Saç ekimi</span> merkezi</a>
                        <div id="topbar-right"></div>
                    </div>
                </div>
            </div>
            <div id="menubar" class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span> </button>
                <a class="navbar-brand d-lg-none" href="<?=$site->url;?>/"><span class="color">Saç ekimi</span> merkezi</a>
                <nav id="mainmenu" class="navbar-left collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="home"><a href="<?=$site->url;?>/">Anasayfa</a></li>
                        <li class="technology"><a href="/turkiye-sac-ekimi-merkezleri.html">Türkiye Saç Ekimi Merkezleri</a></li>
                        <li class="environment"><a href="/istanbul-sac-ekimi-merkezleri.html">İstanbul Saç Ekimi Merkezleri</a></li>
                        <li class="lifestyle"><a href="/ankara-sac-ekimi-merkezleri.html">Ankara Saç Ekimi Merkezleri</a></li>
                        <li class="sports"><a href="/izmir-sac-ekimi-merkezleri.html">İzmir Saç Ekimi Merkezleri</a></li>
                        <li class="health"><a href="/antalya-sac-ekimi-merkezleri.html">Antalya Saç Ekimi Merkezleri</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>