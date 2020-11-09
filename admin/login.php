<?php
session_start();
if(@$_SESSION['blogs_admin'] && @$_SESSION['blogs_id']){
    header('location: index.php');
}
include_once '../vendor/autoload.php';
include_once '../controller/database.php';
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="blog sistemi, saç ekimi için kamuoyu bilgilendirme oluşturur.">
    <meta name="author" content="blog sistemi">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>blog sistemi yönetici girişi</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>
  <body class="login-body">
    <div class="container">
      <form class="form-signin" action="?login=check" method="post">
          <h2 class="form-signin-heading"><strong>Blog Sistemi</strong><br>Yönetici Paneli Girişi</h2>
        <div class="login-wrap">
            <?php
                if(isset($_GET['login'])){
                    switch ($_GET['login']){
                        case'check';
                        $user = $_POST['user'];
                        $pass = $_POST['password'];
                        if(empty($user) || empty($pass)){
                            echo '<div class="alert alert-danger">Kullanıcı Adı yada Şifreniz Boş Olamaz!<br>Lütfen kontrol ederek yeniden deneyiniz</div>';
                        }else{
                            $check = $db->table('uye')
                                ->where('yetki', 1)
                                ->where('aktif', 1)
                                ->where('kullanici', $user)
                                ->where('sifre', sha1(md5($pass)))
                                ->get();
                            if(isset($check->id)){
                                $_SESSION['blogs_admin']  = $check->id;
                                $_SESSION['blogs_id']     = session_id();
                                echo '<div class="alert alert-success">Kullanıcı Girişi Başarılı!<br>İyi Çalışmalar Dileriz '.$check->isim.'</div>';
                                echo '<meta http-equiv="refresh" content="3" />';
                            }else{
                                echo '<div class="alert alert-danger">Kullanıcı Adı yada Şifreniz Hatalı!<br>Lütfen kontrol ederek yeniden deneyiniz</div>';
                            }
                        }
                        break;
                    }
                }
            ?>
            <p>devam etmek için lütfen bilgilerinizi giriniz.</p>
            <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="user" autofocus>
            <input type="password" class="form-control" placeholder="Kullanıcı Şifresi" name="password">
            <button class="btn btn-lg btn-login btn-block" type="submit">Giriş Yap</button>
        </div>
      </form>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
