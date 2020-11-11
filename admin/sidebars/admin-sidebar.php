<?php
    $page = basename($_SERVER['SCRIPT_FILENAME'], '.php');
?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a <?php if($page=="index"){?>class="active"<?php }?> href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Yönetici Ekranı</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" <?php if($page=="site-ayarlari" || $page=="sosyal-ayarlar"){?>class="active"<?php }?> >
                    <i class="fa fa-laptop"></i>
                    <span>Site Yönetimi</span>
                </a>
                <ul class="sub">
                    <li><a <?php if($page=="site-ayarlari"){?>class="active"<?php }?>  href="site-ayarlari.php">Site Ayarları</a></li>
                    <li><a <?php if($page=="sosyal-ayarlar"){?>class="active"<?php }?>  href="sosyal-ayarlar.php">Sosyal Medya Ayarları</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" <?php if($page=="sayfa"){?>class="active"<?php }?> >
                    <i class="fa fa-book"></i>
                    <span>İçerik Yönetimi</span>
                </a>
                <ul class="sub">
                    <li><a href="sayfa.php?s=kategori">Kategoriler</a></li>
                    <li><a href="sayfa.php?s=etiket">Etiketler</a></li>
                    <li><a href="sayfa.php?s=icerik">İçerik Sayfaları</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" <?php if($page=="klinik"){?>class="active"<?php }?> >
                    <i class="fa fa-book"></i>
                    <span>Klinik Yönetimi</span>
                </a>
                <ul class="sub">
                    <li><a href="klinik.php?s=merkez">Klinikler</a></li>
                    <li><a href="klinik.php?s=il">İller</a></li>
                    <li><a href="klinik.php?s=ilce">İlçeler</a></li>
                </ul>
            </li>
            <li>
                <a  href="klinikekle.php">
                    <i class="fa fa-user-plus"></i>
                    <span>Otomatik Klinik Ekle</span>
                </a>
            </li>
            <li>
                <a  href="ping.php">
                    <i class="fa fa-gears fa-spin"></i>
                    <span>Ping Yönetimi</span>
                </a>
            </li>
        </ul>
    </div>
</aside>