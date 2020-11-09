<?php
    $kategori = $db->table('forum_konu')->where('id', $_GET['id'])->get();
?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <strong><?=$kategori->baslik;?></strong> Forum Konusunu Güncelle
            </header>
            <div class="card-body">
                <?php
                if(isset($_GET['s']) && isset($_GET['is'])){
                    include_once 'islem/forum/'.$_GET['s'].'/'.$_GET['is'].'.php';
                }
                ?>
                <form action="?s=konu&p=duzenle&is=duzenle" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$kategori->id;?>">
                    <div class="form-group">
                        <label for="baslik">Konu Başlığı</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Kategori Başlığı" value="<?=$kategori->baslik;?>">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">Konu Açıklaması</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="Kategori Açıklaması" value="<?=$kategori->aciklama;?>">
                    </div>
                    <div class="form-group">
                        <label for="kelime">Kategori</label>
                        <select class="js-example-basic-single" name="kategori">
                            <option value="0">Ana Kategori</option>
                            <?php
                            $kategoriler = $db->table('forum_kategori')->getAll();
                            foreach ($kategoriler as $kategoris){
                                ?>
                                <option value="<?=$kategoris->id;?>" <?php if($kategoris->id==$kategori->kategori){?> selected<?php } ?>><?=$kategoris->baslik;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adres">Konu Linki</label>
                        <input type="text" class="form-control" id="adres" name="url" aria-describedby="adresYardim" placeholder="Kategori Linki" value="<?=$kategori->url;?>">
                    </div>
                    <hr>
                    <div class="form-group row text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Konuyu Güncelle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>