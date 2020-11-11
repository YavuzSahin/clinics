<?php
?>
</div>
<footer id="footer">
    <div class="footer-bottom">
        <div class="container text-center">
            <p><a href="<?=$site->url;?>"><?=$site->baslik_ic?></a>&copy; <?=date('Y');?> </p>
        </div>
    </div>
    <div class="footer-bottom2">
        <div class="container text-center">
            <small><?=$site->baslik_ic?> sitesinde yer alan bilgiler sadece bilgilendirme amacı taşımaktadır. saç ekimi hakkında gerçek tanı yada tedavi içermez. saç ekimi için hekiminize danışmadan karar vermeyiniz. amacımız sadece saç ekimi konusunda kamuoyu bilgilendirmesi oluşturmak. <?=$site->baslik_ic?> herhangi bir klinik yada doktor ile ortak hareket etmemektedir. sitemizde tavsiye bölümünde yer alan bilgiler editörlerimizin kendi görüşleridir ve kesinlik içermez. <?=$site->baslik_ic?> konularında yer alan açıklama ve içerikler kullanıcının kendi paylaşımlarıdır ve <?=$site->baslik_ic?> sorumluluk kabul etmez.</small>
            <br>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js" integrity="sha512-QABeEm/oYtKZVyaO8mQQjePTPplrV8qoT7PrwHDJCBLqZl5UmuPi3APEcWwtTNOiH24psax69XPQtEo5dAkGcA==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        if ($(window).width() >= 960) {
            $(".theiaStickySidebar").sticky({topSpacing:0});
        }
    });
</script>
</body>
</html>
