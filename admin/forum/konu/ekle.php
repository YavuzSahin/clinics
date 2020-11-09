<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Yeni Forum Konusu Ekle
            </header>
            <div class="card-body">
                <?php
                    if(isset($_GET['s']) && isset($_GET['is'])){
                        include_once 'islem/forum/'.$_GET['s'].'/'.$_GET['is'].'.php';
                    }
                ?>
                <form action="?s=konu&p=ekle&is=ekle" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="baslik">Konu Başlığı</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Konu Başlığı">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">Konu Açıklaması</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="Konu Açıklaması">
                    </div>
                    <div class="form-group">
                        <label for="kelime">Kategori</label>
                        <select class="js-example-basic-single" name="kategori">
                            <?php
                            $kategoriler = $db->table('forum_kategori')->getAll();
                            foreach ($kategoriler as $kategori){
                                ?>
                            <option value="<?=$kategori->id;?>"><?=$kategori->baslik;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adres">Konu Linki</label>
                        <input type="text" class="form-control" id="adres" name="url" aria-describedby="adresYardim" placeholder="Konu Linki">
                    </div>
                    <hr>
                    <div class="form-group row text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Konu Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>