<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Yeni Forum Kategorisi Ekle
            </header>
            <div class="card-body">
                <?php
                    if(isset($_GET['s']) && isset($_GET['is'])){
                        include_once 'islem/forum/'.$_GET['s'].'/'.$_GET['is'].'.php';
                    }
                ?>
                <form action="?s=kategori&p=ekle&is=ekle" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="baslik">Kategori Başlığı</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Kategori Başlığı">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">Kategori Açıklaması</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="Kategori Açıklaması">
                    </div>
                    <div class="form-group">
                        <label for="adres">Kategori Linki</label>
                        <input type="text" class="form-control" id="adres" name="url" aria-describedby="adresYardim" placeholder="Kategori Linki">
                    </div>
                    <hr>
                    <div class="form-group row text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Kategori Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>