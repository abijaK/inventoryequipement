<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend-Utilisateur</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css"> -->
</head>

<body>
    <div class="content">

        <div class="body">
            <div class="home">
                <a href="../index.php">Page d'acceuil</a>
            </div>
            <fieldset>
            //partie form
                <form action="utilisateur.php" method="post">
                    <!-- ID-User : <input type="text" name="idUser" required /><br><br> -->
                    <p>
                        User-name : <input type="text" name="nom" required /><br><br>
                    </p>
                    <p>
                        Mot de passe : <input type="password" name="pswd" required /><br><br>
                    </p>
                    <p>
                        RoleSys : <input type="text" name="roleSys" required /><br><br>
                    </p>
                    <p>
                        Email : <input type="text" name="email" required /><br><br>
                    </p>
                    <p>
                        Fonction : <input type="text" name="fonction" required /><br><br>
                    </p>
                    <p>
                        Telephone : <input type="text" name="telephone" required /><br><br>
                    </p>
                    <p>
                        State : <input type="text" name="state" required /><br><br>
                    </p>
                    <p>
                        idServicefk : <input type="text" name="idServicefk" required /><br><br>
                    </p>
                    <input type="submit" value="Enregistrer" />
                </form>
            </fieldset>
            <br>

            <?php
            //Load files path into the class
            require '../Backend/utilisateur.php';
            require '../Manager/utilisateurManager.php';

            //These objects are created just before an user enters such value in the form's input.
            $utilMan = new UtilisateurManager();


            if (isset($_POST['nom'])) {

                // $iduser = $_POST['idUser'];
                $nom = $_POST['nom'];
                $pass = $_POST['pswd'];
                $roleSys = $_POST['roleSys'];
                $email = $_POST['email'];
                $fonct = $_POST['fonction'];
                $tel = $_POST['telephone'];
                $state = $_POST['state'];
                $idServfk = $_POST['idServicefk'];

                $data = [
                    /* 'idUser' => $iduser, */
                    'nom' => $nom, 'pswd' => $pass, 'roleSys' => $roleSys, 'email' => $email, 'fonction' => $fonct, 'telephone' => $tel, 'etat' => $state, 'idServicefk' => $idServfk
                ];
                $user = new Utilisateur($data); // service is an object helping to hydrate the array of data
                $utilMan->saveUsers($user);
            }
            ?>

            <br>
            <h2 class="list">Liste d'Utilisateurs</h2>
            <table>
                <tr>
                    <td>IdUser</td>
                    <td>nom</td>
                    <td>Mot de passe</td>
                    <td>roleSys</td>
                    <td>email</td>
                    <td>fonction</td>
                    <td>telephone</td>
                    <td>etat</td>
                    <td>idServicefk</td>
                </tr>
                <?php
                //'
                $data  = $utilMan->showUsers();
                foreach ($data as $user) {
                    echo '
                    <tr>
                    <td>' . $user->getIdUser() . '</td>' .
                        '<td>' . $user->getNom() . '</td>' .
                        '<td>' . $user->getPassword() . '</td>' .
                        '<td>' . $user->getRoleSys() . '</td>' .
                        '<td>' . $user->getEmail() . '</td>' .
                        '<td>' . $user->getFonction() . '</td>' .
                        '<td>' . $user->getTelephone() . '</td>' .
                        '<td>' . $user->getEtat() . '</td>' .
                        '<td>' . $user->getIdServicefk() . '</td>
                        
                        <td><a href="Utilisateur.php">Edit</a></td>
                        <td><a href="Utilisateur.php?iduser="' . $user->getIdUser() . '>Supprimer</a></td>
                </tr>';
                }

                // if (isset($_GET['iduser'])) {
                //     $id = $_GET['iduser']; //this object get the id that it uses to return the value to delete 
                //     $serviceMan->deleteUser($id);
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