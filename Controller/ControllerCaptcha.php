<?php
session_start();
$_SESSION['captcha_verified'] = false;
if (isset($_POST['submit'])) {
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    if (isset($_SESSION['captcha_string']) && isset($_POST['input'])) {
        if ($_POST['input'] === $_SESSION['captcha_string']) {
            $_SESSION['captcha_verified'] = true;
            header("Location: ../View/ViewConnexion.php");
            exit();
        } else {
            header("Location: ../View/ViewAvConnexion.php");
            exit();
        }
    } else {
        echo "La session captcha n'est pas définie ou l'entrée de l'utilisateur est manquante.";
    }
}
}


?>

<title>Vérification</title>
<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
<link rel="icon" href="../assets/img/logo.png" type="image/x-icon">
<button name="btnRetour" onclick="window.location.href= '../View/ViewAvConnexion.html'" class="btnRetour"> Retour </button>

<?php
$flag = 5;
if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    if (isset($_POST["flag"])) {

if (isset($_POST["flag"])) {
    $input = $_POST["input"];
    $flag = $_POST["flag"];
}

if ($flag == 1) {
    if (isset($_SESSION['captcha_string']) && $input == $_SESSION['captcha_string']) {
        header("Location: ../View/ViewConnexion.php");
        exit();
    } else {
        header("Location: ../View/ViewAvConnexion.html");
        exit();
        $input = $_POST["input"];
        $flag = $_POST["flag"];
    }

    if ($flag == 1) {
        if (isset($_SESSION['captcha_string']) && $input == $_SESSION['captcha_string']) {
            header("Location: ../View/ViewConnexion.php");
            $isValide = true;
            echo '<script>' . $isValide . '</script>';
            exit();
        } else {
            header("Location: ../View/ViewAvConnexion.php");
            exit();
        }
    } else {
        create_image();
        display();
    }
}
function display()
{
?><body class="body">
<div style="text-align:center;">
    <h3>ENTREZ LE TEXTE QUE VOUS VOYEZ DANS L'IMAGE</h3>
    <b>Ceci est juste pour vérifier que vous n'êtes pas un robot</b>
    <div style="display:block;margin-bottom:20px;margin-top:20px;">
        <img src="image.png">
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="input"/>
        <input type="hidden" name="flag" value="1"/>
        <input type="submit" value="Envoyer" name="submit"/>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    </form>
</div>
<?php
}

function create_image()
{
    // Créer une image
    $image = imagecreatetruecolor(200, 50);

    // Définir la couleur de fond
    $background_color = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

    // Définir la couleur des lignes
    $line_color = imagecolorallocate($image, 64, 64, 64);
    for ($i = 0; $i < 5; $i++) {
        imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
    }

    // Générer et afficher le texte captcha
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $len = strlen($letters);
    $word = '';
    $text_color = imagecolorallocate($image, 0, 0, 0);
    for ($i = 0; $i < 6; $i++) {
        $letter = $letters[rand(0, $len - 1)];
        imagestring($image, 5, 5 + ($i * 30), 20, $letter, $text_color);
        $word .= $letter;
    }
    $_SESSION['captcha_string'] = $word;

    // Ajouter des pixels aléatoires
    $pixel_color = imagecolorallocate($image, 0, 0, 255);
    for ($i = 0; $i < 100; $i++) {
        imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
    }

    // Sauvegarder l'image en tant que fichier PNG
    imagepng($image, "image.png");

    // Libérer la mémoire
    imagedestroy($image);
}
?>
</body>