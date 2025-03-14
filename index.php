<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	#
	# Entrada a esborrar: usuari 3 creat amb el projecte zendldap2
	#
	$uid = 'usr3';
	$unorg = 'usuaris';
	$dn = 'uid='.$uid.',ou='.$unorg.',dc=clotfje,dc=net';
	#
	#Opcions de la connexió al servidor i base de dades LDAP
	$opcions = [
		'host' => 'zend-dacomo.clotfje.net',
		'username' => 'cn=admin,dc=clotfje,dc=net',
		'password' => 'fjeclot',
		'bindRequiresDn' => true,
		'accountDomainName' => 'clotfje.net',
		'baseDn' => 'dc=clotfje,dc=net',		
	];
	#
	# Esborrant l'entrada
	#
	$ldap = new Ldap($opcions);
	$ldap->bind();
	try{
	    $ldap->delete($dn);
	    echo "<b>Entrada esborrada</b><br>"; 
	} catch (Exception $e){
	   echo "<b>Aquesta entrada no existeix</b><br>";
	}
?>
