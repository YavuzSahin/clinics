<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Yeni İçerik Ekle
            </header>
            <div class="card-body">
                <?php
                    if(isset($_GET['s']) && isset($_GET['is'])){
                        include_once 'islem/'.$_GET['s'].'/'.$_GET['is'].'.php';
                    }
                ?>
                <form action="?s=icerik&p=ekle&is=ekle" method="post" enctype="multipart/form-data">
                  <div class="content-div">
                    <div class="form-group">
                        <label for="baslik">İçerik Başlığı</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="İçerik Başlığı">
                    </div>
                    <div class="form-group">
                        <label for="baslik-ic">İçerik Başlığı iç sayfalar için</label>
                        <input type="text" class="form-control" id="baslik-ic" name="baslik_ic" aria-describedby="baslikYardim" placeholder="İçerik Başlığı">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">İçerik Açıklaması</label>
                        <input type="text" class="form-control" id="aciklama" name="aciklama" aria-describedby="aciklamaYardim" placeholder="İçerik Açıklaması">
                    </div>
                    <div class="form-group">
                        <label class="control-label">İçerik</label>
                        <textarea class="form-control" id="editor" name="icerik" rows="20"></textarea>
                    </div>
                  </div>
                  <div class="content-options">
                    <div class="form-group">
                          <label for="adres">Kategori Linki</label>
                          <input type="text" class="form-control" id="adres" name="url" aria-describedby="adresYardim" placeholder="İçerik Linki">
                    </div>
                    <div class="form-group">
                          <label for="kelime">Kategoriler</label>
                          <select class="js-example-basic-single" name="kategori">
                              <?php
                              $kategoriler = $db->table('kategori')->getAll();
                              foreach ($kategoriler as $kategori){
                                  ?>
                                  <option value="<?=$kategori->id;?>"><?=$kategori->baslik;?></option>
                              <?php } ?>
                          </select>
                      </div>
                    <div class="form-group">
                          <label for="etiket">Etiketler</label>
                          <select class="js-example-basic-multiple" name="etiket[]" multiple>
                              <?php
                              $etiketler = $db->table('etiket')->getAll();
                              foreach ($etiketler as $etiket){
                                  ?>
                                  <option value="<?=$etiket->id;?>"><?=$etiket->baslik;?></option>
                              <?php } ?>
                          </select>
                      </div>
                    <div class="form-group image">
                        <label class="control-label">İçerik Görseli</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    İçerik Görseli Seç… <input type="file" name="image" id="imgInp">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <div class="preview-image">
                            <img id='img-upload'/>
                        </div>
                    </div>

                  </div>
                    <div class="form-group save text-right">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">İçerik Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>