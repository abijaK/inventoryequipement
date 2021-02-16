<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend-Categorie</title>
</head>

<body>
    <div class="content">
        <div class="home">
            <a href="../index.php">Page d'acceuil</a>
        </div>
        <fieldset>
            <form action="categorie.php" method="post">
                Categorie <input type="text" name="categorie" id="categorie">
                <input type="submit" value="Envoyer"><br>
            </form>
        </fieldset><br>
        <?php
        require '../Backend/categorie.php';
        require '../Backend/serviceManager.php';

        $serviceMan = new ServiceManager();

        if (isset($_POST['categorie'])) {
            $categ = $_POST['categorie'];
            $data = ['designation' => $categ];
            $cat = new Categorie($data);
            $serviceMan->saveCat($cat);
        }
        ?>
        <hr>
        <h2>Table Categorie</h2>
        <table>
            <tr>
                <td>Designation</td>
            </tr>
            <?php
            $data = $serviceMan->showCategorie();
            foreach ($data as $cat) {
                echo '<tr>
                    <td>' . $cat->getDesignation() . '</td>
                    <td><a href="Service.php">Edit</a></td>
                    <td><a href="Service.php">Supprimer</a></td>
                    </tr>';
            }

            if (isset($_GET['categ'])) {
                $id = $_GET['categ'];
                $serviceMan->deleteCategorie($id);
                header('Location: ' . $_SERVER['PHP_SELF']);
            }
            ?>
        </table>
    </div>
</body>

</html>