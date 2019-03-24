<?php
require 'vendor/autoload.php';

const bucketName = 'bucket';

use AWS\S3\S3Client;

$s3 = new Aws\S3\S3Client([
	'version' => 'latest',
	'region' => 'eu-west-3',
	'endpoint' => 'http://172.20.10.6:9001/minio',
	'use_path_style_endpoint' => true,
	'credentials' => [
		'key' => 'daravuth',
		'secret' => 'daravuth',
	],
]);

if (!$s3->doesBucketExist(bucketName)){
	$s3->createBucket([
		'Bucket' => bucketName
	]);
}

//Envoi une requête et retourn le resultat de l'objet
function upload($clef, $path){
	global $s3;
	return $s3->putObject([
		'Bucket' => bucketName,
		'Key' => $clef,
		'Body' => $path
	]);
}


//Téléchargement du contenu de l'objet
function dl($clef){
	global $s3;
	return $s3->getObject([
		'Bucket' => bucketName,
		'Key' => $clef,
	]);
	return $output['Body'];
}
//Suppression de l'objet
function suppression($clef){
global $s3;
return $s3->deleteObject([
        'Bucket' => bucketName,
        'Key' => $clef,
    ]);
}
?>
