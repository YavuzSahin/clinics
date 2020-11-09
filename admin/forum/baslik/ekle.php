<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Yeni Forum Başlığı Ekle
            </header>
            <div class="card-body">
                <?php
                    if(isset($_GET['s']) && isset($_GET['is'])){
                        include_once 'islem/forum/'.$_GET['s'].'/'.$_GET['is'].'.php';
                    }
                ?>
                <form action="?s=baslik&p=ekle&is=ekle" method="post" enctype="multipart/form-data">
                  <div class="content-div">
                    <div class="form-group">
                        <label for="baslik">Başlık</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Başlık">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">İçerik Açıklaması</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="Başlık Açıklaması">
                        <small id="defaultaciklama" class="form-text text-muted">standart açıklama ekle</small>
                    </div>
                    <div class="form-group">
                        <label class="control-label">İçerik</label>
                        <textarea class="form-control" id="editor" name="icerik" rows="20"></textarea>
                    </div>
                  </div>
                  <div class="content-options">
                    <div class="form-group options">
                        <div class="checkboxes">
                            <label class="label_check" for="checkbox-01"><input name="sabit" id="checkbox-01" value="1" type="radio" /> Sabit İçerik </label>
                            <label class="label_check" for="checkbox-02"><input name="anasayfa" id="checkbox-02" value="1" type="radio" /> Anasayfada Göster </label>
                        </div>
                    </div>
                    <div class="form-group">
                          <label for="adres">Başlık Linki</label>
                          <input type="text" class="form-control" id="adres" name="url" aria-describedby="adresYardim" placeholder="Başlık Linki">
                    </div>
                    <div class="form-group">
                          <label for="kelime">Forum Konusu</label>
                          <select class="js-example-basic-single" name="konu">
                              <?php
                              $kategoriler = $db->table('forum_konu')->getAll();
                              foreach ($kategoriler as $kategori){
                                  ?>
                                  <option value="<?=$kategori->id;?>"><?=$kategori->baslik;?></option>
                              <?php } ?>
                          </select>
                      </div>

                  </div>
                    <div class="form-group save text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Başlık Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>