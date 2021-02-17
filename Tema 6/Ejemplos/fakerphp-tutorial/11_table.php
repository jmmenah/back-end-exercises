<?php
/*
 * Using Faker to Generate Filler Data for Automated Testing
 * https://code.tutsplus.com/tutorials/using-faker-to-generate-filler-data-for-automated-testing--cms-26824
 */

function spacer()
{
    echo "<br />\n";
}

require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();
echo '<table>
<thead>
<th>French</th>
<th>Russian</th>
<th>English</th>
<th>Chinese</th>
</thead>
<tr><td>';
$faker = Faker\Factory::create('fr_FR'); // create a French faker
for ($i = 0; $i < 10; $i++) {
    echo $faker->name;
    spacer();
}
spacer();
echo '</td><td>';
$faker = Faker\Factory::create('Ru_RU'); // create Russian
for ($i = 0; $i < 10; $i++) {
    echo $faker->name;
    spacer();
}
spacer();
echo '</td><td>';
$faker = Faker\Factory::create('En_US'); // create English
for ($i = 0; $i < 10; $i++) {
    echo $faker->name;
    spacer();
}
spacer();
echo '</td><td>';
$faker = Faker\Factory::create('zh_CN'); // create Chinese
for ($i = 0; $i < 10; $i++) {
    echo $faker->name;
    spacer();
}
echo '</td>
      </tr>
      </table>';
