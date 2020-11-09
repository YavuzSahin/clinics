<?php
$uye = $db->table('uye')->where('id', $_GET['id'])->get();
?>

<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="#">
                    <img src="img/profile-avatar.jpg" alt="">
                </a>
                <h1><?=$uye->kullanici;?></h1>
                <p><?=$uye->eposta;?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="active nav-item"><a class="nav-link" href="uye.php?s=uye&p=duzenle&id=<?=$uye->id;?>"> <i class="fa fa-user"></i> Profil Detayları</a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <section class="card">
            <div class="card-body bio-graph-info">
                <h1><strong><?=$uye->kullanici;?></strong> profil detayları</h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span>İsim ve Soyisim </span>: <?=$uye->isim;?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Üyelik Tarihi</span>: <?=date('d-m-Y H:i:s', strtotime($uye->eklenme_tarihi));?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>E-Posta Adresi </span>: <?=$uye->eposta;?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Doğum Tarihi</span>: <?=date('d-m-Y', strtotime($uye->dogum_tarihi));?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>İl </span>: <?=$uye->il;?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Rütbe </span>: <?=uyeRutbe($uye->rutbe);?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Aktif/Pasif </span>: <?=uyeAktif($uye->aktif);?></p>
                    </div>
                    <div class="bio-row">
                        <p><span>Yetkilendirme </span>: <?=uyeYetki($uye->yetki)?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="card">
            <div class="card-body bio-graph-info">
                <h1><strong><?=$uye->kullanici;?></strong> kullanıcısının başlattığı son 10 konu</h1>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th width="60%">Konu Başlığı</th>
                            <th width="20%">Oluşturma Tarihi</th>
                            <th width="10%;">Cevap</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $basliklar = $db->table('forum_baslik')->where('yazar', $uye->id)->limit(0,10)->orderby('eklenme_tarihi', 'desc')->getAll();
                            foreach ($basliklar as $baslik){
                        ?>
                        <tr>
                            <td><?=$baslik->id;?></td>
                            <td><?=$baslik->baslik;?></td>
                            <td><?=date('d-m-Y H:i', strtotime($baslik->eklenme_tarihi));?></td>
                            <td><?=forumCevapSayi($baslik->id);?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </aside>
</div>
