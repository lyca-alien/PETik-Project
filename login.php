<?php

//use Google\Cloud\Firestore\FirestoreClient;
require_once 'firestore.php';

$fs = new firestore(collection:'admin');
//$fs = new firestore(collection:'food'); // drop new doc food


//print_r($fs->getDocument(name: '3yBsyU7BYV4APf0vR4oD'));
//print_r($fs->newDocument('3yBsyU7BYV4APf0vR4oD',['adminpass' => 'admin12345']));
//$fs->getWhere(field: 'adminpass', operator: '=', value: 'admin123');
//print_r($fs->newUserCollection(name:'food', doc_name: 'meat'));
//print_r($fs->dropDocument(name:'meat'));
//print_r($fs->dropCollection(name: 'food'));

if(!empty($_POST)) 
{

	$user = $_POST['text'];
	$pass = $_POST['pass'];

	if(empty($user) || empty($pass)) {
		header("Location: index.php?error=emptyfields");
		exit();
	}
	else{
		$fs->getWhere('adminpass', '=',  $pass,  'adminuser',  '=', $user);
	}

}
else{
	header("Location: index.php");
	exit();
}

