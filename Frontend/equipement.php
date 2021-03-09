<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend-Equipement</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"> -->
</head>

<body>
    <?php
    //Load files path into the class
    require '../Backend/equipement.php';
    require '../Manager/equipementManager.php';

    //These objects are created just before an user enters such value in the form's input.
    $equipMan = new EquipementManager();
    ?>
    <div class="content">
        <div class="body">

            <div class="home">
                <a href="../index.php">Page d'acceuil</a>
            </div>
            <fieldset>
                <form action="equipement.php" method="post">
                    <!-- idEquipement : <input type="text" name="idEquipement" required /><br><br> -->
                    <p>
                        Designation : <input type="text" name="designation" required />
                    </p>
                    <p>
                        model : <input type="text" name="model" required />
                    </p>
                    <p>
                        marque : <input type="text" name="marque" required />
                    </p>
                    <p>
                        Categoriefk :<select name="categoriefk">
                            <option value="" selected></option>
                            <?php

                            $tab = $equipMan->loadCat();
                            foreach ($tab as  $item) {

                                echo '<option value="' . $item['designation'] . '">' . $item['designation'] . '</option>';
                            }
                            ?>
                        </select><br>
                    </p>
                    <p>
                        dateAcquisition : <input type="date" name="dateAcquisition" required />
                    </p>
                    <p>
                        description : <textarea name="description" required>
                    </textarea>
                    </p>
                    <input type="submit" value="Enregistrer" />
                </form>
            </fieldset>
            <br>

            <?php


            if (isset($_POST['designation'])) {
                // isset() test if the superglobal variable $_POST exists or is used, then it processes the inputs
                // $idEq = $_POST['idEquipement'];
                $design = $_POST['designation'];
                $model = $_POST['model'];
                $marque = $_POST['marque'];
                $catfk = $_POST['categoriefk'];
                $dateAcqui = $_POST['dateAcquisition'];
                $desc = $_POST['description'];

                $data = [
                    'designation' => $design, 'model' => $model, 'marque' => $marque, 'categoriefk' => $catfk, 'dateAcquisition' => $dateAcqui, 'description' => $desc
                ];
                $equip = new Equipement($data); // equip is an object helping to hydrate the array of data
                $equipMan->saveEquip($equip);
            }
            ?>

            <br>
            <h2 class="list">Liste des equipements</h2>
            <table>
                <tr>
                    <td>IdEquipement</td>
                    <td>Designation</td>
                    <td>Model</td>
                    <td>Marque</td>
                    <td>Categoriefk</td>
                    <td>dateAcquisition</td>
                    <td>Description</td>
                </tr>
                <?php
                $data  = $equipMan->showEquipement();
                foreach ($data as $equip) {
                    echo '
                    <tr>
                    <td>' . $equip->getIdEquipement() . '</td>' .
                        '<td>' . $equip->getDesignation() . '</td>' .
                        '<td>' . $equip->getModel() . '</td>' .
                        '<td>' . $equip->getMarque() . '</td>' .
                        '<td>' . $equip->getCategoriefk() . '</td>' .
                        '<td>' . $equip->getDateAcquisition() . '</td>' .
                        '<td>' . $equip->getDescription() . '</td>
                        
                        <td><a href="Equipement.php">Edit</a></td>
                        <td><a href="Equipement.php">Supprimer</a></td>
                </tr>';
                }

                // if (isset($_GET['idEq'])) {
                //     $id = $_GET['idEq']; //this object get the id that it uses to return the value to delete 
                //     $equipMan->deleteEquipement($id);
                //     header('Location: ' . $_SERVER['PHP_SELF']); //this method is used to refresh the page when the value is deleted
                // }
                ?>


            </table>
        </div>
        <hr>
        <div class="footer">
            <p>copyRight@Cime-Ulpgl</p>
        </div>
    </div>
</body>

</html>