<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="widEquipementth=device-widEquipementth, initial-scale=1.0">
	<title>Inventory Management</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div class="titre">
		<h2>Bienvenu au Logiciel de gestion des equipements</h2>
	</div>
	<div class="menu">
		<p>
			<a href="Frontend/service.php">Service</a>
		</p>
		<p>
			<a href="Frontend/annee.php">Annee</a>
		</p>
		<p>
			<a href="Frontend/categorie.php">Categorie</a>
		</p>
		<p>
			<a href="Frontend/equipement.php">Equipement</a>
		</p>
		<p>
			<a href="Frontend/affectationEquip.php">Affectation</a>
		</p>
		<p>
			<a href="Frontend/maintenance.php">Maintenance</a>
		</p>
		<p>
			<a href="Frontend/utilisateur.php">Utilisateur</a>
		</p>
	</div>

	<?php

	function loadClasses($class)
	{
		require('Backend/' . $class . '.php');
	}

	spl_autoload_register('loadClasses');

	// $string = "this-is-a-sample-text";
	// $strings = explode('-', $string);
	// echo end($strings);
	// var_dump($strings);



	// $equi = new Equipement;

	// $equi->setidEquipement(2);
	// $equi->setDesignation('Designation: Ordi');
	// $equi->setModel('Model: Portable');
	// $equi->setMarque('Marque: DELL');
	// /* $equi->setCategory('Blablabla'); */
	// $equi->setDateAcquisition('DateAcquisition:08/02/21');
	// $equi->setDescription('Description: Service Academique');

	// $equi->display();

	// echo '<hr>';

	// $categ = new categorie;

	// $categ->setDesignation('Designation: equipement informatique');

	// $categ->display();

	// echo '<hr>';

	// $affect = new Affectation;

	// $affect->setIdAffectation(1);
	// $affect->setDateAffect('DateAffectation: 08/12/2020');
	// $affect->setIdEquipementfk('idEquipementfk: 6');
	// $affect->setIdServicefk('idServicefk:4');
	// $affect->setDureeAmort('Duree Amortissement: 6 mois');
	// $affect->setAnneefk(2021);
	// $affect->setEtat('Etat: Fonctionnel');
	// $affect->setDescription('Description: cette machine est destinnee au service de la comptabilite');

	// $affect->display();

	// echo '<hr>';

	// $ann = new Annee;
	// $ann->setAnnee('2020-2021');
	// $ann->display();

	// echo '<hr>';

	// $maintenance = new Maintenance;
	// $maintenance->setIdMaintenance(1);
	// $maintenance->setdateMaintenance('Date: 8/02/2021');
	// $maintenance->setMotif('Motif de la maintenace: lenteur grave du systme d"exploitation');
	// $maintenance->setDescription('Description de la panne: la machine commencer a presenter des lenteurs du systeme des le demarrage de la machine');
	// $maintenance->setOperateur('Operateur: Jean Zelote');
	// $maintenance->display();

	// echo '<hr>';

	// $service = new Service;
	// $service->setIdService(1);
	// $service->setDesignation('DesignationService: Administration');
	// $service->display();

	// echo '<hr>';

	// $user = new Utilisateur;
	// $user->setIdUser(1);
	// $user->setNom('Nom: Jean');
	// $user->setRoleSys('Role systeme: Informatique');
	// $user->setEmail('Email: mulondajean@hotmail.com');
	// $user->setFonction('Fonction: Cybertsecurity Manager');
	// $user->setTelephone('Telephone: +243970534575');
	// $user->setIdServicefk('IdService: 1');
	// $user->display();

	// $an = new Annee;

	// $an->setAnnee('dlsdg');
	// $an->getAnnee();

	$data = [
		'idService' => 1,
		'designation' => 'NTIC'
	];

	$serv = new Service($data);
	// $serv->serviceHydrator($data);
	echo $serv->getIdService() . '-' . $serv->getDesignation();
	?>
</body>

</html>