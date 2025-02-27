<?php

require_once('vendor/autoload.php');
$faker = Faker\Factory::create('en_PH');

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = 'fakersql';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//MASS FAKE DATA ADDITION TO OFFICES TABLE


$sql = $conn->prepare("INSERT INTO office(name,contactnum,email,address,city,country,postal) VALUES (?,?,?,?,?,?,?)");
$sql->bind_param('sssssss', $name, $contactnum, $email, $address, $city, $country, $postal);


for ($i = 1; $i <= 50; $i++) {
  $name = $faker->unique()->company;
  $contactnum = $faker->unique()->phoneNumber;
  $email = $faker->unique()->companyEmail;
  $address = $faker->address;
  $city = $faker->city;
  $country = "Philippines";
  $postal = $faker->unique()->postcode;

  $sql->execute();
}

// MASS FAKE DATA ADDITION TO EMPLOYEES TABLES

$office_ids = [];
$result = $conn->query("SELECT id FROM office");
while ($row = $result->fetch_assoc()) {
  $office_ids[] = $row['id'];
}

$sql = $conn->prepare("INSERT INTO employee(lastname,firstname,office_id,address) VALUES (?,?,?,?)");
$sql->bind_param('ssis', $firstname, $lastname, $office_id, $address);

for ($i = 1; $i <= 200; $i++) {
  $lastname = $faker->unique()->lastName;
  $firstname = $faker->firstName;
  $office_id = $faker->randomElement($office_ids);
  $address = $faker->address;

  $sql->execute();
}


//MASS FAKE DATA ADDITION TO TRANSACTION TABLE

$sql = $conn->prepare("INSERT INTO transaction (employee_id,office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)");


$actions = ['Created', 'Updated', 'Deleted', 'Reviewed', 'Approved', 'Rejected', 'Forwarded', 'Completed'];
$remarksTemplates = [
  "Document has been successfully processed.",
  "Approval pending for further review.",
  "Request has been forwarded to the appropriate department.",
  "Action completed without any issues.",
  "Some errors were found and need correction.",
  "Employee has acknowledged the request.",
  "Additional information is required to proceed.",
  "Transaction has been successfully logged."
];

$office_ids = [];
$result = $conn->query("SELECT id FROM office");
while ($row = $result->fetch_assoc()) {
  $office_ids[] = $row['id'];
}

$employee_ids = [];
$result = $conn->query("SELECT id FROM employee");
while ($row = $result->fetch_assoc()) {
  $employee_ids[] = $row['id'];
}


for ($i = 0; $i < 500; $i++) {
  $employee_id = $faker->randomElement($employee_ids);
  $office_id = $faker->randomElement($office_ids);
  $datelog = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');
  $action = $faker->randomElement($actions);
  $remarks = $faker->randomElement($remarksTemplates);
  $documentcode = strtoupper($faker->bothify('DOC###'));

  $sql->bind_param("iissss", $employee_id, $office_id, $datelog, $action, $remarks, $documentcode);
  $sql->execute();
}


$sql->close();
$conn->close();
