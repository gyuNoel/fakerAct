<?php
require 'vendor/autoload.php';
$faker = Faker\Factory::create('en_PH');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Fake User Profiles (Philippines)</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Birthdate</th>
                    <th>Job Title</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $jobPositions = [
                    'Software Engineer',
                    'Data Analyst',
                    'Graphic Designer',
                    'Project Manager',
                    'Marketing Specialist',
                    'Sales Representative',
                    'Accountant',
                    'Human Resources Manager',
                    'Customer Support Specialist',
                    'Web Developer',
                    'Network Administrator',
                    'Content Writer',
                    'Product Manager',
                    'Business Analyst',
                    'Financial Advisor',
                    'Operations Manager',
                    'Social Media Manager',
                    'Quality Assurance Engineer',
                    'Systems Administrator',
                    'UI/UX Designer',
                    'DevOps Engineer',
                    'IT Support Technician',
                    'Digital Marketing Manager',
                    'Technical Writer',
                    'Recruitment Consultant',
                    'Legal Assistant',
                    'Architect',
                    'Civil Engineer',
                    'Mechanical Engineer',
                    'Electrical Engineer',
                    'Nurse',
                    'Doctor',
                    'Teacher',
                    'Professor',
                    'Chef',
                ];

                for ($i = 0; $i <= 5; $i++) {
                    echo "<tr>";
                    echo '<td>' . $faker->name . '</td>';
                    echo '<td>' . $faker->email . '</td>';
                    echo '<td>' . $faker->mobileNumber() . '</td>';
                    echo '<td>' . $faker->address . '</td>';
                    echo '<td>' . $faker->date('Y-m-d') . '</td>';
                    echo '<td>' . $faker->randomElement($jobPositions) . '</td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>