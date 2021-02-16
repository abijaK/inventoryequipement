<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend-Service</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"> -->
</head>

<body>
    <div class="content">
        <div class="head">
            Menu
        </div>

        <div class="body">
            <div class="home">
                <a href="../index.php">Page d'acceuil</a>
            </div>
            <fieldset>
                <form action="service.php" method="post">
                    IdService : <input type="text" name="idservice" required /><br><br>
                    Designation : <input type="text" name="designation" required />
                    <br><br>
                    <input type="submit" value="Enregistrer" />
                </form>
            </fieldset>
            <br>

            <?php
            //Load files path into the class
            require '../Backend/service.php';
            require '../Backend/serviceManager.php';

            //These objects are created just before an user enters such value in the form's input.
            $serviceMan = new ServiceManager();

            // 

            if (isset($_POST['idservice'])) {
                // isset() test if the superglobal variable $_POST exists, then it processes the inputs
                $idser = $_POST['idservice'];
                $design = $_POST['designation'];
                $data = ['idservice' => $idser, 'designation' => $design];
                $service = new Service($data); // service is an object helping to hydrate the array of data
                $serviceMan->saveService($service);

                // $service->serviceHydrator($data);
                // $tabObjService[] = $service->serviceHydrator($data); // Array of objects
            }

            ?>

            <br>
            <h2 class="list">Liste des services</h2>
            <table>
                <tr>
                    <td>Id</td>
                    <td>Designation</td>
                </tr>
                <?php
                $data  = $serviceMan->showService();
                foreach ($data as $service) {
                    echo '
                    <tr>
                    <td>' . $service->getIdService() . '</td>' .
                        '<td>' . $service->getDesignation() . '</td>
                        
                        <td><a href="Service.php">Edit</a></td>
                        <td><a href="Service.php?idser"' . $service->getIdService() . '>Supprimer</a></td>
                </tr>';
                }

                // if (isset($_GET['idser'])) {
                //     $id = $_GET['idser']; //this object get the id that it uses to return the value to delete 
                //     $serviceMan->deleteService($id);
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