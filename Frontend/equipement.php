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
    require '../Backend/serviceManager.php';

    //These objects are created just before an user enters such value in the form's input.
    $serviceMan = new ServiceManager();
    ?>
    <div class="content">
        <div class="body">

            <div class="home">
                <a href="../index.php">Page d'acceuil</a>
            </div>
            <fieldset>
                <form action="equipement.php" method="post">
                    idEquipement : <input type="text" name="idEquipement" required /><br><br>
                    Designation : <input type="text" name="designation" required />
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
            <br>

            <?php


            if (isset($_POST['idEquipement'])) {
                // isset() test if the superglobal variable $_POST exists or is used, then it processes the inputs
                $idEq = $_POST['idEquipement'];
                $design = $_POST['designation'];
                $model = $_POST['model'];
                $marque = $_POST['marque'];
                $catfk = $_POST['categoriefk'];
                $dateAcqui = $_POST['dateAcquisition'];
                $desc = $_POST['description'];

                $data = [
                    'idEquipement' => $idEq, 'designation' => $design, 'model' => $model, 'marque' => $marque, 'categoriefk' => $catfk, 'dateAcquisition' => $dateAcqui, 'description' => $desc
                ];
                $equip = new Equipement($data); // service is an object helping to hydrate the array of data
                $serviceMan->saveEquip($equip);
            }

            ?>

            <br>
            <h2 class="list">Liste des services</h2>
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
                $data  = $serviceMan->showEquipement();
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

                if (isset($_GET['idEq'])) {
                    $id = $_GET['idEq']; //this object get the id that it uses to return the value to delete 
                    $serviceMan->deleteEquipement($id);
                    header('Location: ' . $_SERVER['PHP_SELF']); //this method is used to refresh the page when the value is deleted
                }
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