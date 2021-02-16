<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend-Affectation</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
    require '../Backend/affectation.php';
    require '../Backend/serviceManager.php';
    $serviceMan = new ServiceManager();
    ?>
    <div class="content">
        <div class="home">
            <a href="../index.php">Page d'acceuil</a>
        </div>

        <fieldset>
            <form action="affectation.php" method="post">
                ID : <input type="text" name="id"><br><br>
                Date : <input type="date" name="dateAf"><br><br>
                <p>
                    ID-Equipement :<select name="idEqui">
                        <option value="" selected></option>
                        <?php

                        $tab = $serviceMan->loadEquip();
                        foreach ($tab as  $item) {

                            echo '<option value="' . $item['idEquipement'] . '">' . $item['designation'] . '</option>';
                        }
                        ?>
                    </select><br>
                </p>
                ID-Service : <select name="idServ">
                    <option value="" selected></option>
                    <?php

                    $tab = $serviceMan->loadDesignService();
                    foreach ($tab as  $item) {

                        echo '<option value="' . $item['idService'] . '">' . $item['designation'] . '</option>';
                    }
                    ?>
                </select><br><br>
                Duree-Amortissement : <input type="text" name="dureeAm"><br><br>
                Annee :<select name="annee">
                    <option value="" selected></option>
                    <?php

                    $tab = $serviceMan->loadAnnee();
                    foreach ($tab as  $item) {

                        echo '<option value="' . $item['annee'] . '">' . $item['annee'] . '</option>';
                    }
                    ?>
                </select>

                <br><br>
                Etat-Equipement : <input type="text" name="etats"><br><br>
                Descriptions : <input type="text" name="desk"><br><br>
                <input type="submit" value="Enregistrer"><br>
            </form>
        </fieldset>
        <?php


        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $date = $_POST['dateAf'];
            $idEqui = $_POST['idEqui'];
            $idServ = $_POST['idServ'];
            $dureeAm = $_POST['dureeAm'];
            $annee = $_POST['annee'];
            $etats = $_POST['etats'];
            $desk = $_POST['desk'];
            $data = ['idAffectation' => $id, 'anneefk' => $annee, 'dateAffectation' => $date, 'idEquipementfk' => $idEqui, 'idServicefk' => $idServ, 'dureeAmort' => $dureeAm, 'etat' => $etats, 'descriptions' => $desk];
            $affect = new Affectation($data);
            $serviceMan->saveAffect($affect);
        }
        ?>
        <br>
        <h2>Affectation d'equipements</h2>
        <table>
            <tr>
                <td>ID</td>
                <td>Date</td>
                <td>ID-Equipement</td>
                <td>ID-Service</td>
                <td>Duree-Amortissement</td>
                <td>Annee</td>
                <td>Etat</td>
                <td>Description</td>
            </tr>
            <?php

            $data = $serviceMan->showAffectation();
            foreach ($data as $affect) {
                echo '
            <tr>
            <td>' . $affect->getIdAffectation() . '</td>' .
                    '<td>' . $affect->getDateAffectation() . '</td>' .
                    '<td>' . $affect->getIdEquipementfk() . '</td>' .
                    '<td>' . $affect->getIdServicefk() . '</td>' .
                    '<td>' . $affect->getDureeAmort() . '</td>' .
                    '<td>' . $affect->getAnneefk() . '</td>' .
                    '<td>' . $affect->getEtat() . '</td>' .
                    '<td>' . $affect->getDescriptions() . '</td>
                <td><a href="affectation.php">Edit</a></td>
                 <td><a href="affectation.php">Supprimer</a></td>
            </tr>';
            }

            // if (isset($_GET['id'])) {
            //     $id = $_GET['id'];
            //     $serviceMan->deleteAffectation($id);
            //     header('Location: ' . $_SERVER['PHP_SELF']);
            // }

            ?>
        </table>
    </div>
    <hr>
    <div class="footer">
        <p>copyRight@Cime-Ulpgl</p>
    </div>
</body>

</html>