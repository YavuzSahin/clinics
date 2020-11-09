<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Yeni İçerik Etiketi Ekle
            </header>
            <div class="card-body">
                <?php
                    if(isset($_GET['s']) && isset($_GET['is'])){
                        include_once 'islem/'.$_GET['s'].'/'.$_GET['is'].'.php';
                    }
                ?>
                <form action="?s=etiket&p=ekle&is=ekle" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="baslik">Etiket Başlığı</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Etiket Başlığı">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">Etiket Açıklaması</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="Etiket Açıklaması">
                    </div>
                    <div class="form-group">
                        <label for="adres">Kategori Linki</label>
                        <input type="text" class="form-control" id="adres" name="url" aria-describedby="adresYardim" placeholder="Etiket Linki">
                    </div>
                    <hr>
                    <div class="form-group row text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Etiket Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>