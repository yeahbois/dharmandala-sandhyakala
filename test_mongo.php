<?php
require 'vendor/autoload.php';

$uri = "mongodb+srv://marcellolienarta663:HJyR8ftWmyXmGATO@dharmakala.salljfg.mongodb.net/?retryWrites=true&w=majority&appName=Dharmakala";

$client = new MongoDB\Client($uri, [
    'ssl' => true,
    'tlsAllowInvalidCertificates' => true,
    'tlsAllowInvalidHostnames' => true,
]);

$db = $client->selectDatabase('pudobooth');

// List all collections inside pudobooth
foreach ($db->listCollections() as $collection) {
    echo $collection->getName() . PHP_EOL;
}

// Select the pbqueue collection
$collection = $db->selectCollection('pbqueue');

// Insert example document
foreach ($collection->find([]) as $ti) {
    echo json_encode($ti, JSON_PRETTY_PRINT) . PHP_EOL;
}
$collection->insertOne(['name' => 'Thomi', 'order' => 1]);