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
                <h4>Modifier une promo</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Code</label>
                        <input type="text" class="form-control" required name="code" placeholder="Code">
                        <label for="exampleFormControlInput1">Nom</label>
                        <input type="text" class="form-control" required name="nom" placeholder="Nom">
                        <label for="exampleFormControlInput1">Mois</label>
                        <input type="month" class="form-control" required name="mois" placeholder="Mois">
                        <label for="exampleFormControlInput1">Nombre d'apprenants</label>
                        <input type="number" class="form-control" required name="nda" placeholder="Nombre d'apprenants">
                        <label for="exampleFormControlInput1">Années</label>
                        <input type="number" class="form-control" required name="annee" placeholder="Mois" min="1900" max="2099" step="1" value="2019" />


                        <br>
                        <button type="submit" name="modifier" class="btn btn-info">Modifier </button>
                    </div>
                </form>

            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Mois</th>
                            <th scope="col">Nombre D'apprenants</th>
                            <th scope="col">Années</th>


                        </tr>
                    </thead>
                    <?php
                    $listep = fopen('listepromo.txt', 'ab+');
                    if (isset($_POST['modifier'])) {
                        while (!feof($listep)) {
                            $srt = trim(fgets($listep));
                            $tab = explode(';', $srt);

                            if ($tab[0] == $_POST['code']) {
                                $ligne = $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['mois'] . ';' . $_POST['nda'] . ';' . $_POST['annee'];
                            } else {
                                $ligne = $srt;
                            }
                            $modif = $modif . $ligne . "\n";
                        }
                        fclose($listep);

                        $listep = fopen('listepromo.txt', 'w+');
                        fwrite($listep, trim($modif));
                        fclose($listep);
                    }
                    $listep = fopen('listepromo.txt', 'ab+');
                    while (!feof($listep)) {
                        $srt = trim(fgets($listep));
                        $tab = explode(';', $srt); ?>
                        <tbody>
                            <tr>
                                <th scope="row"> <?php echo $tab[0]; ?> </th>
                                <td> <?php echo $tab[1]; ?> </td>
                                <td> <?php echo $tab[2]; ?></td>
                                <td><?php echo $tab[3]; ?></td>
                                <td scope="col"> <?php echo $tab[4]; ?> </td>
                            </tr>
                        </tbody>
                    <?php
                }


                fclose($listep); ?>
                </table>
            </div>
        </div>
       
    </div>

    <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-info"> <marquee behavior="alternate"> ©2019  SONATEL ACADEMY DMG </marquee>  </nav> 
</body>

</html>