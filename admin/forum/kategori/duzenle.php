<?php
    $kategori = $db->table('forum_kategori')->where('id', $_GET['id'])->get();
?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <strong><?=$kategori->baslik;?></strong> Forum Kategorisini Güncelle
            </header>
            <div class="card-body">
                <?php
                if(isset($_GET['s']) && isset($_GET['is'])){
                    include_once 'islem/forum/'.$_GET['s'].'/'.$_GET['is'].'.php';
                }
                ?>
                <form action="?s=kategori&p=duzenle&is=duzenle" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$kategori->id;?>">
                    <div class="form-group">
                        <label for="baslik">Kategori Başlığı</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Kategori Başlığı" value="<?=$kategori->baslik;?>">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">Kategori Açıklaması</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="Kategori Açıklaması" value="<?=$kategori->aciklama;?>">
                    </div>
                    <div class="form-group">
                        <label for="adres">Kategori Linki</label>
                        <input type="text" class="form-control" id="adres" name="url" aria-describedby="adresYardim" placeholder="Kategori Linki" value="<?=$kategori->url;?>">
                    </div>
                    <hr>
                    <div class="form-group row text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Kategori Güncelle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>