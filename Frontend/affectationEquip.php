<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affectation</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>

<body>
    <?php
    require '../Backend/affectationEquip.php';
    require '../Manager/affectationManager.php';
    $affectMan = new AffectationManager();

    ?>
    <div class="content">
        <div class="home">
            <a href="../index.php">Page d'accueil</a>
        </div>
        <div class="formul">
            <fieldset>
                <form action="affectationEquip.php" method="post">
                    <!-- ID-Affectation : <input type="text" name="idaff"> -->
                    <p>
                        ID-Equipement : <select name="idEquip">
                            <!-- <option value="" selected></option> -->
                            <?php

                            $tab = $affectMan->loadEquip();
                            foreach ($tab as  $item) {

                                echo '<option value="' . $item['idEquipement'] . '">' . $item['designation'] . '</option>';
                            }
                            ?>

                        </select>
                    </p>
                    <p>
                        ID-Service : <select name="idServi">
                            <!-- <option value="" selected></option> -->
                            <?php

                            $tab = $affectMan->loadDesignService();
                            foreach ($tab as  $item) {

                                echo '<option value="' . $item['idService'] . '">' . $item['designation'] . '</option>';
                            }
                            ?>
                        </select>
                    </p>
                    <p>Date : <input type="date" name="dateaff"></p>

                    <p>Duree-Amortissement : <input type="text" name="durAmort"></p>
                    <p>
                        Annee : <select name="anee">
                            <?php

                            $tab = $affectMan->loadAnnee();
                            foreach ($tab as  $item) {

                                echo '<option value="' . $item['annee'] . '">' . $item['annee'] . '</option>';
                            }
                            ?>
                        </select>
                    </p>
                    <p>
                        Etat-Equipement : <input type="text" name="eta">
                    </p>
                    <p>
                        Description : <input type="text" name="descr">
                    </p>

                    <input type="submit" value="Enregistrer">
                </form>
            </fieldset>
        </div>
        <?php

        if (isset($_POST['dateaff'])) {
            // $id = $_POST['idaff'];
            $date = $_POST['dateaff'];
            $idEqui = $_POST['idEquip'];
            $idServ = $_POST['idServi'];
            $dureeAm = $_POST['durAmort'];
            $annee = $_POST['anee'];
            $etats = $_POST['eta'];
            $desk = $_POST['descr'];
            $data = [
                'dateAffEqu' => $date, 'idEqufk' => $idEqui, 'idServifk' => $idServ, 'amortDuree' => $dureeAm,
                'anneeAfk' => $annee, 'eta' => $etats, 'descr' => $desk
            ];
            $affect = new AffectationEquip($data);
            echo  $affect->getIdEqufk();
            $affectMan->saveAffectationEquip($affect);
        }
        ?>
        <br>
        <h2>Affectation d'equipements</h2>
        <table border="1px">
            <tr>
                <td>ID-Affectation</td>
                <td>ID-Equipement</td>
                <td>ID-Service</td>
                <td>Date</td>
                <td>Duree-Amortissement</td>
                <td>Annee</td>
                <td>Etat</td>
                <td>Description</td>
            </tr>
            <?php
            $data = $affectMan->showAffectationEquip();

            foreach ($data as $affect) {

                //  print_r($data);
                echo '<br>
            <tr>
            <td>' . $affect['idAffEqu'] . '</td>' .
                    '<td>' . $affect['equip'] . '</td>' .
                    '<td>' . $affect['service'] . '</td>' .
                    '<td>' . $affect['dateAffEqu'] . '</td>' .
                    '<td>' . $affect['amortDuree'] . '</td>' .
                    '<td>' . $affect['anneeAfk'] . '</td>' .
                    '<td>' . $affect['eta'] . '</td>' .
                    '<td>' . $affect['descr'] . '</td>
                <td><a href="affectationEquip.php">Edit</a></td>
                 <td><a href="affectationEquip.php">Supprimer</a></td>
            </tr>';
            }

            // if (isset($_GET['idaff'])) {
            //     $id = $_GET['idaff'];
            //     $affectMan->deleteAffectationEquip($id);
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