<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        h5 {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-lg-12">

            <nav id="nav1" class="navbar navbar-expand-lg navbar-light bg-info text-center">
                    <a class="navbar-brand"  href="ajouterpromo.php">Ajouter Promo</a>
                    <a class="navbar-brand" href="listepromo.php">Liste des Promos </a>
                    <a class="navbar-brand" href="modifierpromo.php">Modifier Promo</a>
                    <a class="navbar-brand" href="inscription.php">Inscription</a>
                    <a class="navbar-brand" href="modification.php">Modifier Apprenants </a>
                    <a class="navbar-brand" href="liste.php"> Apprenants </a>
                    <a class="navbar-brand" href="afficherparpromo.php"> Liste Par Promo </a>
                    <a class="navbar-brand" href="index.php"> Deconnexion </a>
                    <div class="col-lg-1"></div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </nav>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form action="" method="post">
                    <div class="form-group">
                        <!-- <label for="exampleFormControlInput1">Code</label>
                        <input type="text" class="form-control" name="code" required placeholder="Code"> -->
                        <label for="exampleFormControlInput1">Nom</label>
                        <input type="text" class="form-control" name="nom" required placeholder="Nom">
                        <label for="exampleFormControlInput1">Prenom</label>
                        <input type="text" class="form-control" name="prenom" required placeholder="Prenom">
                        <label for="exampleFormControlInput1">Nom de la Promo</label>
                        <select name="ndp" class="form-control">
                            
                            <?php
                    $listep = fopen('listepromo.txt', 'ab+');
                    while (!feof($listep)) {
                        $srt = trim(fgets($listep));
                        $tab = explode(';', $srt);
                     
                      echo " <option value=".$tab[1].">".$tab[1]."</option>";
                    }  

                    fclose($liste);    
                        ?>
                          
                        </select>
                        <label for="exampleFormControlInput1">Date de Naissance</label>
                        <input type="date" class="form-control" name="date" required placeholder="JJ-MM-AAAA">
                        <label for="exampleFormControlInput1">Telephone</label>
                        <input type="number" class="form-control" name="tel" required placeholder="Telephone">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" name="email" required placeholder="name@example.com">
                        <br>
                        <button type="submit" class="btn btn-info" name="ajouter">Ajouter</button>
                    </div>
                </form>

            </div>
            <div class="col-lg-4"></div>
        </div>


    </div>
    <?php
  
        $liste = fopen('liste.txt', 'ab+');
        $_POST['code']=rand(1,500);
        if (isset($_POST['ajouter'])) {
        while (!feof($liste)) {
            $srt = trim(fgets($liste));
            $tab = explode(';', $srt);
            $tab = "present";
        }
            if ($_POST['code'] == $tab[0]) {
                echo "<h5 >le code existe deja reassayer!</h5 >";
            } else {
                $a="MGD";
                $_POST['code']=$a.$_POST['code'];
                $ligne = "\n" .$_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['prenom'] . ';' . $_POST['ndp'] . ';' . $_POST['date'] . ';' . $_POST['tel'] . ';' . $_POST['email'] . ';' . $tab;
            
                fwrite($liste, $ligne);
            }
        

        fclose($liste);
    }

    ?>
     <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-info"> <marquee behavior="alternate"> ©2019  SONATEL ACADEMY DMG </marquee>  </nav> 
</body>

</html>