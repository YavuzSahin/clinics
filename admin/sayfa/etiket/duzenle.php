<?php
    $etiket = $db->table('etiket')->where('id', $_GET['id'])->get();
?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <strong><?=$etiket->baslik;?></strong> İçerik Etiketini Güncelle
            </header>
            <div class="card-body">
                <?php
                if(isset($_GET['s']) && isset($_GET['is'])){
                    include_once 'islem/'.$_GET['s'].'/'.$_GET['is'].'.php';
                }
                ?>
                <form action="?s=etiket&p=duzenle&is=duzenle" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$etiket->id;?>">
                    <div class="form-group">
                        <label for="baslik">Etiket Başlığı</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Etiket Başlığı" value="<?=$etiket->baslik;?>">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">Etiket Açıklaması</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="Etiket Açıklaması" value="<?=$etiket->aciklama;?>">
                    </div>
                    <div class="form-group">
                        <label for="adres">Etiket Linki</label>
                        <input type="text" class="form-control" id="adres" name="url" aria-describedby="adresYardim" placeholder="Etiket Linki" value="<?=$etiket->url;?>">
                    </div>
                    <hr>
                    <div class="form-group row text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Etiketi Güncelle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>