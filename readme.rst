// step pertama
	buat database bernama kost
    buat table bank isinya id foto nama_bank
    id -> integer
    foto -> text
    nama_bank -> varchar

// step kedua 
    atur database yang berada di folder application -> config -> database.php
    'username' => 'root',
	'password' => '',
	'database' => 'kost',

//step ketiga
    atur file config yang berada di folder application -> config -> config.php
    $config['base_url'] = 'http://localhost/apici';

//step keempat
    atur autoload library yang berada di folder application -> config -> autoload.php
    $autoload['libraries'] = array('database');

//step kelima
    nanti configurasi untuk CRUD ada di welcome.php foldernya di application -> contollers -> welcome.php

    bisa juga sih edit2nya itu pake base template yang ada di Model_crud.php.. contohnya kalo disitu buat get data.. tapi di welcome.php saya komen


more info buat belajar hubungi : https://wa.me/628986688226 terimakasih :v eheheh