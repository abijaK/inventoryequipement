<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend-Maintenance</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"> -->
</head>

<body>
    <?php
    //Load files path into the class
    require '../Backend/maintenance.php';
    require '../Manager/maintenanceManager.php';

    //These objects are created just before an user enters such value in the form's input.
    $mainteMan = new MaintenanceManager();
    ?>
    <div class="content">
        <div class="body">

            <div class="home">
                <a href="../index.php">Page d'acceuil</a>
            </div>
            <fieldset>
                <form action="maintenance.php" method="post">
                    <!-- IdMaintenance : <input type="text" name="idMaintenance" required /><br><br> -->
                    <p>
                        DateMaintenance : <input type="date" name="dateMaintenance" required />
                    </p>
                    <p>
                        Motif : <input type="text" name="motif" required />
                    </p>
                    <p>
                        Description : <input type="text" name="description" required />
                    </p>
                    <p>
                        Operateur : <input type="text" name="operateur" required />
                    </p>
                    <p>
                        IdAffectationfk :<select name="idAffectationfk">
                            <option value="" selected></option>
                            <?php

                            $tab = $mainteMan->loadAffectfk();
                            foreach ($tab as  $item) {

                                echo '<option value="' . $item['designation'] . '">' . $item['designation'] . '</option>';
                            }
                            ?>
                        </select><br>
                    </p>
                    <input type="submit" value="Enregistrer" />
                </form>
            </fieldset>
            <br>

            <?php

            if (isset($_POST['dateMaintenance'])) {
                // isset() test if the superglobal variable $_POST exists, then it processes the inputs
                // $idmaint = $_POST['idMaintenance'];
                $dateMaint = $_POST['dateMaintenance'];
                $motif = $_POST['motif'];
                $descript = $_POST['description'];
                $opera = $_POST['operateur'];
                $idAffectfk = $_POST['idAffectationfk'];
                $data = ['dateMaintenance' => $dateMaint, 'motif' => $motif, 'description' => $descript, 'operateur' => $opera, 'idAffectationfk' => $idAffectfk];
                $maint = new Maintenance($data); // maint is an object helping to hydrate the array of data
                $mainteMan->saveMaint($maint);
            }

            ?>

            <br>
            <h2 class="list">Maintenance d'equipement</h2>
            <table>
                <tr>
                    <td>IdMaintenance</td>
                    <td>DateMaintenance</td>
                    <td>Motif</td>
                    <td>Description</td>
                    <td>Operateur</td>
                    <td>IdAffectationfk</td>
                </tr>

                <?php
                // '
                $data  = $mainteMan->showMaintenance();
                foreach ($data as $maint) {
                    echo '
                         <tr>
                         <td>' . $maint->getIdMaintenance() . '</td>' .
                        '<td>' . $maint->getDateMaintenance() . '</td>' .
                        '<td>' . $maint->getMotif() . '</td>' .
                        '<td>' . $maint->getDescription() . '</td>' .
                        '<td>' . $maint->getOperateur() . '</td>' .
                        '<td>' . $maint->getIdAffectationfk() . '</td>
    
                            <td><a href="Maintenance.php">Edit</a></td>
                            <td><a href="Maintenance.php">Supprimer</a></td>
                    </tr>';
                }

                // if (isset($_GET['idmaint'])) {
                //     $id = $_GET['idmaint']; //this object get the id that it uses to return the value to delete 
                //     $mainteMan->deleteMaintenance($id);
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