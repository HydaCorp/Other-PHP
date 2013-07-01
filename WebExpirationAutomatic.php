<?php
$date1 = date("Y-m-d H:i:s");
$date2 = "2012-09-31 23:10:20";

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));


$diff2 = strtotime($date2) - strtotime($date1);

print $diff2;

exit;
?>
<style>
#webtrial {
    position: fixed;
    width: 97%;
    height: 50px;
    background: #D9FFA8;
    border: 2px solid red;
    padding: 10px;
    color: red;
    z-index: 1000;
    text-align: center;
    left: 3px;
}
</style>
<div id="webtrial">
    <?php if($days <=0) { ?>
    <style>
        #webtrial {
            height: 200px;
            top: 100px;
            padding-top: 100px;
        }
        body {
            background: #000;
        }
    </style>
    Website ini telah <b>EXPIRED!</b> (Melebihi batas waktu trial selama 2 hari)<br>
    Silahkan melakukan pelunasan administrasi untuk aktivasi website anda.
    <!-- EXPIRED! -->
    <?php
    exit();
    } else { ?>
    <!-- TRIAL! -->
    Website ini dalam masa trial selama 2 hari. Website akan expire dalam <b><?php printf("%d hari\n", $days); ?></b>.<Br>
    Silahkan melakukan pelunasan administrasi untuk aktivasi website anda.
    <?php } ?>
</div>
