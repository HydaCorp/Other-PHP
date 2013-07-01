<form action="" method="post" name="form">
<input type="text" name="text"/>
<input type="submit" name="cari"/>
</form>
<?
include 'db.php';
if(isset($_POST['cari'])){
        $cari = trim($_POST['text']);
        $cari = htmlentities(strip_tags($cari), ENT_QUOTES);
if (empty($cari)){
  echo "Anda Belum mengetik yang akan di cari<br /> <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
} else {
        echo 'melakukan pencarian untuk : '.$cari.'<br/> ';
        $sql = mysql_query("SELECT * FROM artikel WHERE judul LIKE '%$cari%' OR artikel LIKE '%$cari%' ORDER BY id DESC");
        $jumlah = mysql_num_rows($sql);
        if ($jumlah > 0){
                echo '<p> Ada '.$jumlah.' data yang sesuai</p>';
                while ($hasil=mysql_fetch_array($sql)){
                        echo '<a href=artikel.php?id='.$hasil['id'].'>'.$hasil['judul'].'</a><br/>';
                }
        }
        else {
                echo "Tidak di temukan";
                }
        }
}
?>
