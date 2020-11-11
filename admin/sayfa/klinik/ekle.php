<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Yeni Klinik Ekle
            </header>
            <div class="card-body">
                <?php
                    if(isset($_GET['s']) && isset($_GET['is'])){
                        include_once 'islem/'.$_GET['s'].'/'.$_GET['is'].'.php';
                    }
                ?>
                <form action="?s=merkez&p=ekle&is=ekle" method="post" enctype="multipart/form-data">
                  <div class="content-div">
                    <div class="form-group">
                        <label for="baslik">Klinik Adı</label>
                        <input type="text" class="form-control" id="baslik" name="baslik" aria-describedby="baslikYardim" placeholder="Klinik Adı">
                    </div>
                    <div class="form-group">
                        <label for="baslik-ic">Telefon Numarası</label>
                        <input type="text" class="form-control" id="telefon" name="telefon" aria-describedby="baslikYardim" placeholder="Telefon Numarası">
                    </div>
                    <div class="form-group">
                        <label for="baslik-ic">Whatsapp Numarası</label>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" aria-describedby="baslikYardim" placeholder="Whatsapp Numarası">
                    </div>
                    <div class="form-group">
                        <label for="baslik-ic">Web Sitesi</label>
                        <input type="text" class="form-control" id="website" name="website" aria-describedby="baslikYardim" placeholder="Web Sitesi">
                    </div>
                    <div class="form-group">
                        <label for="baslik-ic">Facebook Adresi</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="baslikYardim" placeholder="Facebook Adresi">
                    </div>
                    <div class="form-group">
                        <label for="baslik-ic">İnstagram Adresi</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="baslikYardim" placeholder="İnstagram Adresi">
                    </div>
                    <div class="form-group">
                        <label for="aciklama">Klinik Açıklaması</label>
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
                          <label for="kelime">Sponsorlu</label>
                          <select class="js-example-basic-single" name="sponsorlu">
                              <option value="0">Hayır</option>
                              <option value="1">Evet</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="sehir">İl</label>
                          <select class="js-example-basic-single" name="sehir">
                              <?php
                              $sehirler = $db->table('sehir')->getAll();
                              foreach ($sehirler as $sehir){
                                  ?>
                                  <option value="<?=$sehir->plaka;?>"><?=$sehir->baslik;?></option>
                              <?php } ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="ilce">İlçe</label>
                          <select class="js-example-basic-single" name="ilce">
                              <option>Lütfen İl Seçiniz</option>
                          </select>
                      </div>
                    <div class="form-group image">
                        <label class="control-label">Klinik Logosu</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    Klinik Logosu Seç… <input type="file" name="image" id="imgInp">
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
                            <button type="submit" class="btn btn-primary">Klinik Ekle</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>