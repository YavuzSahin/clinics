<?php
include_once '../vendor/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
    function seoUrl($s) {
        $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',', '?', "'");
        $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','', '', "");
        $s = str_replace($tr,$eng,$s);
        $s = strtolower($s);
        $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = preg_replace('/#/', '', $s);
        $s = str_replace('.', '', $s);
        $s = trim($s, '-');
        return $s;
    }

    function connect(){
        $config = [
            'host'		=> 'localhost',
            'driver'	=> 'mysql',
            'database'	=> db_name,
            'username'	=> db_user,
            'password'	=> db_pass,
            'charset'	=> 'utf8',
            'collation'	=> 'utf8_general_ci',
            'prefix'	 => ''
        ];

        return new \Buki\Pdox($config);
    }

    //kategori adı
    function kategoriAdi($id){
        $db = connect();
        $kategori = $db->table('kategori')->where('id', $id)->get();
        if(!isset($kategori->id)){
            return "Ana Kategori";
        }else {
            return $kategori->baslik;
        }
    }
    function kategoriAdiIcerik($id){
        $ids = explode(', ', $id);
        $db = connect();
        $kategoriler = $db->table('kategori')->in('id', $ids)->getAll();
        $cikti='';
        foreach ($kategoriler as $kategori){
            $cikti.= $kategori->baslik.', ';
        }
        $cikti = rtrim($cikti, ', ');
        return $cikti;
    }
    function yazar($id){
        $db = connect();
        $yazar = $db->table('uye')->where('id', $id)->get();
        return $yazar;
    }
    function forumKategori($id){
        $db = connect();
        $kategori = $db->table('forum_kategori')->where('id', $id)->get();
            return $kategori->baslik;
    }
    function forumKonu($id){
        $db = connect();
        $kategori = $db->table('forum_konu')->where('id', $id)->get();
            return $kategori->baslik;
    }
    function forumCevapSayi($id){
        $db = connect();
        $count = $db->table('forum_cevap')->where('forum_id', $id)->count('id', 'total_row')->get();
        return $count->total_row;
    }

    function uyeRutbe($rutbe){
        $rutbeler = [
            1=>'Yönetici',
            2=>'Moderator',
            3=>'Bölüm Yöneticisi',
            4=>'Kıdemli Üye',
            5=>'Yazıcı',
            6=>'Yeni Üye'
        ];
        return $rutbeler[$rutbe];
    }

    function uyeAktif($durum){
        $aktif = [1=>'Aktif Üye', 2=>'Pasif Üye'];
        return $aktif[$durum];
    }

    function uyeYetki($yetki){
        $yetkiler = [
            1=>'Yönetici',
            2=>'Moderator',
            3=>'Bölüm Yöneticisi',
            4=>'Üye'
        ];
        return $yetkiler[$yetki];
    }

    function turkcetarih($f, $zt = 'now'){
        $z = date("$f", strtotime($zt));
        $donustur = array(
            'Monday'	=> 'Pazartesi',
            'Tuesday'	=> 'Salı',
            'Wednesday'	=> 'Çarşamba',
            'Thursday'	=> 'Perşembe',
            'Friday'	=> 'Cuma',
            'Saturday'	=> 'Cumartesi',
            'Sunday'	=> 'Pazar',
            'January'	=> 'Ocak',
            'February'	=> 'Şubat',
            'March'		=> 'Mart',
            'April'		=> 'Nisan',
            'May'		=> 'Mayıs',
            'June'		=> 'Haziran',
            'July'		=> 'Temmuz',
            'August'	=> 'Ağustos',
            'September'	=> 'Eylül',
            'October'	=> 'Ekim',
            'November'	=> 'Kasım',
            'December'	=> 'Aralık',
            'Mon'		=> 'Pts',
            'Tue'		=> 'Sal',
            'Wed'		=> 'Çar',
            'Thu'		=> 'Per',
            'Fri'		=> 'Cum',
            'Sat'		=> 'Cts',
            'Sun'		=> 'Paz',
            'Jan'		=> 'Oca',
            'Feb'		=> 'Şub',
            'Mar'		=> 'Mar',
            'Apr'		=> 'Nis',
            'Jun'		=> 'Haz',
            'Jul'		=> 'Tem',
            'Aug'		=> 'Ağu',
            'Sep'		=> 'Eyl',
            'Oct'		=> 'Eki',
            'Nov'		=> 'Kas',
            'Dec'		=> 'Ara',
        );
        foreach($donustur as $en => $tr){
            $z = str_replace($en, $tr, $z);
        }
        if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
        return $z;
    }


function sehir($ID){
    $db=connect();
    if($ID==0 or empty($ID)){
        echo "İstanbul";
    }else {
        $sehir = $db->table('sehir')->where('plaka', $ID)->get();
        echo $sehir->sehir;
    }
}
function ilce($ID){
    $db=connect();
    if($ID==0){
        echo "Tüm İstanbul";
    }else {
        $sehir = $db->table('ilce')->where('id', $ID)->get();
        echo $sehir->ilce;
    }
}

