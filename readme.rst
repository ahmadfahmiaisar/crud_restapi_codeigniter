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
    