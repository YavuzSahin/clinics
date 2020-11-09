<?php
$icerik = $db->table('sayfa')->where('id', $_GET['id'])->get();
?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <strong><?=$icerik->baslik;?></strong> İçeriğini Yayından Kaldır
            </header>
            <div class="card-body">
                <?php
                if(isset($_GET['s']) && isset($_GET['is'])){
                    include_once 'islem/'.$_GET['s'].'/'.$_GET['is'].'.php';
                }
                ?>
                <form action="?s=icerik&p=kaldir&is=kaldir" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$icerik->id;?>">
                    <p><strong><?=$icerik->baslik;?></strong> İçeriğini Yayından Kaldırmak İstediğinizden Emin misiniz?</p>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-danger">Yayından Kaldır</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
</div>