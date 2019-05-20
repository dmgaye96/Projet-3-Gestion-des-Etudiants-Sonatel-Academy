<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    $code = $_GET['code'];

    $liste = fopen('liste.txt', 'ab+');
    while (!feof($liste)) {
        $srt = trim(fgets($liste));
        $tab = explode(';', $srt);
        if ($code == $tab[0]) {
            if ($tab[7] == "present") {
                $ex = "exclue";
                $ligne = $tab[0] . ';' . $tab[1] . ';' . $tab[2] . ';' . $tab[3] . ';' . $tab[4] . ';' . $tab[5] . ';' . $tab[6] . ';' . $ex;
            } else {
                $pr = "present";
                $ligne = $tab[0] . ';' . $tab[1] . ';' . $tab[2] . ';' . $tab[3] . ';' . $tab[4] . ';' . $tab[5] . ';' . $tab[6] . ';' . $pr;
            }
        } else $ligne = $srt;
        $modif = $modif . $ligne . "\n";
    }
    fclose($liste);
    $liste = fopen('liste.txt', 'w+');
    fwrite($liste, trim($modif));
    fclose($liste);
    header("location:liste.php");
    ?>
</body>

</html>