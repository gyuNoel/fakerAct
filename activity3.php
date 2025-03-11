<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h2 class="mb-4">Fake User Profiles (Philippines)</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Account Created</th>
                </tr>
            </thead>
            <tbody>
<?php
require 'vendor/autoload.php';
$faker = Faker\Factory::create('en_PH');

//uuid, full name, emailadd, username (lowercase ver of first part of email), password sha-256 encrypted, date acc created (past 2 years)

for ($i = 0; $i <= 10; $i++) {
    echo "<tr>";
    echo '<td>' . $faker->uuid();  '</td>';//uuid
    echo '<td>' . $faker->name();  '</td>';//fullname
    $email = $faker->email; // Email Address
    echo '<td>' . $email .  '</td>';//email
    echo '<td>' . $username = strtolower(explode('@', $email)[0]);  '</td>';//username
    echo '<td>' . $faker->sha256();  '</td>';//password
    echo '<td>' . $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d') .  '</td>';//account date creation
    echo "</tr>";
}

?>
</tbody>
        </table>
    </div>
</body>
</html>