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
    require '../Backend/affectManager.php';
    $affectMan = new AffectManager();
    ?>
    <div class="content">
        <div class="home">
            <a href="../index.php">Page d'accueil</a>
        </div>
        <fieldset>
            <form action="affectationEquip.php" method="post">
                ID-Affectation : <input type="text" name="idaff" required /><br><br>
                ID-Equipement : <input type="text" name="idEquip" required />
                model : <input type="text" name="model" required /><br><br>
                marque : <input type="text" name="marque" required />


                <p>
                    Categoriefk :<select name="categoriefk">
                        <option value="" selected></option>
                        <?php

                        $tab = $serviceMan->loadCat();
                        foreach ($tab as  $item) {

                            echo '<option value="' . $item['designation'] . '">' . $item['designation'] . '</option>';
                        }
                        ?>
                    </select><br>
                </p>
                dateAcquisition : <input type="date" name="dateAcquisition" required />
                description : <input type="text" name="description" required /><br><br>
                <input type="submit" value="Enregistrer" />
            </form>
        </fieldset>
        <div class="formul">
            <fieldset>
                <form action="affectationEquip.php" method="post">
                    ID-Affectation : <input type="text" name="idaff">
                    <p>
                        ID-Equipement : <select name="idEquip">
                            <option value="" selected>
                                <?php

                                $tab = $serviceMan->loadEquip();
                                foreach ($tab as  $item) {

                                    echo '<option value="' . $item['idEquipement'] . '">' . $item['designation'] . '</option>';
                                }
                                ?>
                            </option>
                        </select>
                    </p>
                    <p>
                        ID-Service : <select name="idServi">
                            <option value="" selected>
                                <?php

                                $tab = $serviceMan->loadDesignService();
                                foreach ($tab as  $item) {

                                    echo '<option value="' . $item['idService'] . '">' . $item['designation'] . '</option>';
                                }
                                ?>
                        </select>
                    </p>
                    Date : <input type="date" name="dateaff">

                    Duree-Amortissement : <input type="text" name="durAmort">
                    <p>
                        Annee : <select name="anee">
                            <option value="" selected>5555</option>
                            <?php

                            $tab = $serviceMan->loadAnnee();
                            foreach ($tab as  $item) {

                                echo '<option value="' . $item['annee'] . '">' . $item['annee'] . '</option>';
                            }
                            ?>
                        </select>
                    </p>
                    Etat-Equipement : <input type="text" name="eta">
                    Description : <input type="text" name="descr">

                    <input type="submit" value="Enregistrer">
                </form>
            </fieldset>
        </div>
        <?php

        if (isset($_POST['idaff'])) {
            $id = $_POST['idaff'];
            $date = $_POST['dateaff'];
            $idEqui = $_POST['idEquip'];
            $idServ = $_POST['idServi'];
            $dureeAm = $_POST['durAmort'];
            $annee = $_POST['anee'];
            $etats = $_POST['eta'];
            $desk = $_POST['descri'];
            $data = ['idAffEqu' => $id, 'dateAffEqu' => $date, 'idEqufk' => $idEqui, 'idServifk' => $idServ, 'amortDuree' => $dureeAm,  'anneeAfk' => $annee, 'eta' => $etats, 'descr' => $desk];
            $affect = new AffectationEquip($data);
            $serviceMan->saveAffectationEquip($affect);
        }
        ?>

        <br>
        <h2>Affectation d'equipements</h2>
        <table>
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

            $data = $affectManMan->showAffectationEquip();
            foreach ($data as $affect) {
                echo '
            <tr>
            <td>' . $affect->getIdAffEqu() . '</td>' .
                    '<td>' . $affect->getIdEqufk() . '</td>' .
                    '<td>' . $affect->getIdServifk() . '</td>' .
                    '<td>' . $affect->getDateAffEqu() . '</td>' .
                    '<td>' . $affect->getAmortDuree() . '</td>' .
                    '<td>' . $affect->getAnneeAfk() . '</td>' .
                    '<td>' . $affect->getEta() . '</td>' .
                    '<td>' . $affect->getDescr() . '</td>
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