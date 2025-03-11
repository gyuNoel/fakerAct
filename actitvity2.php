
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
        <h2 class="mb-4">Fake Books</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Year</th>
                    <th>ISBN</th>
                    <th>Summary</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $genres = [
                    "Fiction",
                    "Mystery",
                    "Science Fiction",
                    "Fantasy",
                    "Romance",
                    "Thriller",
                    "Historical",
                    "Horror"
                ];

                for ($i = 0; $i <= 15; $i++) {
                    echo "<tr>";
                    echo '<td>' . $faker->word();  '</td>';
                    echo '<td>' . $faker->name . '</td>';
                    echo '<td>' . $faker->randomElement($genres) . '</td>';
                    echo '<td>' . $faker->dateTimeBetween('-104 years', 'now')->format('Y'). '</td>';
                    echo '<td>' . $faker->numerify('#############').  '</td>';
                    echo '<td>' . $faker->paragraph(2) . '</td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>