<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend-Annee</title>
</head>

<body>
    <div class="content">
        <div class="home">
            <a href="../index.php">Page d'acceuil</a>
        </div>
        <fieldset>
            <form action="annee.php" method="post">
                Annee : <input type="text" name="annee" id="annee" required /> <input type="submit" value="Enregistrer" />

            </form>
        </fieldset><br>

        <?php
        require '../Backend/annee.php';
        require '../Manager/anneeManager.php';

        $anneeMan = new AnneeManager();

        if (isset($_POST['annee'])) {
            $attrAnnee = $_POST['annee'];
            $data = ['annee' => $attrAnnee];
            $newAnnee = new Annee($data);
            $anneeMan->saveAnnee($newAnnee);
            // var_dump($serviceManager);
        }
        ?>

        <p>
        <h2>Annee d'attribution de l'equipement</h2>
        </p>
        <table>
            <tr>
                <td>Annee</td>
            </tr>
            <?php
            $data = $anneeMan->showAnnee();
            foreach ($data as $newAnnee) {
                echo '
                <tr>
                    <td>' . $newAnnee->getAnnee() . '</td>
                    <td><a href="annee.php">Edit</a></td>
                    <td><a href="annee.php">Supprimer</a></td>
                </tr>';
            }

            // if (isset($_GET['attrAnnee'])) {
            //     $id = $_GET['attrAnnee'];
            //     $anneeMan->deleteAnnee($id);
            //     header('Location: ' . $_SERVER['PHP_SELF']);
            // }
            ?>
        </table>
        <hr>
        <div class="footer">
            <p>copyRight@Cime-Ulpgl</p>
        </div>
    </div>

</body>

</html>