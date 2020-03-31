<?php

// $mahasiswa = 
// [
//     [
//     "nama" => "Andrew Run",
//     "nrp" => "0312392042",
//     "email" => "andrew@email.com"
//     ],
//     [
//     "nama" => "Trent Shoot",
//     "nrp" => "093458234",
//     "email" => "trent@email.com"
//     ]
// ];

// ambil dari db
$dbh = new PDO('mysql:host=localhost;dbname=phpdasar','root','');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();

$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;

?>