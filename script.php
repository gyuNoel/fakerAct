<?php

use Faker\Provider\ar_JO\Company;

require_once('vendor/autoload.php');
$faker = Faker\Factory::create('en_PH');

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = 'fakersql';
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

//MASS FAKE DATA ADDITION TO OFFICES


$sql = $conn->prepare("INSERT INTO office(name,contactnum,email,address,city,country,postal) VALUES (?,?,?,?,?,?,?)");
$sql->bind_param('sssssss',$name,$contactnum,$email,$address,$city,$country,$postal);


for($i=1;$i<=50;$i++){
    $name = $faker->unique()->company;
    $contactnum = $faker->unique()->phoneNumber;
    $email = $faker->unique()->companyEmail;
    $address = $faker->address;
    $city = $faker->city;
    $country = "Philippines";
    $postal = $faker->unique()->postcode;
    
    $sql->execute();
}

// MASS FAKE DATA ADDITION TO EMPLOYEES

$office_ids = [];
$result = $conn->query("SELECT id FROM office");
while ($row = $result->fetch_assoc()) {
    $office_ids[] = $row['id'];
  }

$sql = $conn->prepare("INSERT INTO employee(lastname,firstname,office_id,address) VALUES (?,?,?,?)");
$sql->bind_param('ssis',$lastname,$firstname,$officeid,$address);

for($i=1;$i<=200;$i++){
  $lastname = $faker->unique()->lastName;
  $firstname = $faker->firstName;
  $officeid = $faker->randomElement($office_ids);
  $address = $faker->address;

  $sql->execute();
}


$sql->close();
$conn->close();

?>