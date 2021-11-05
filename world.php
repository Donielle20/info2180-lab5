<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = $_GET['country'];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$rtmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$country%'");

$results2 = $rtmt->fetchAll(PDO::FETCH_ASSOC);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_GET['context'] == 'cities')
{
  echo "<table>";
  echo "<tr>";
  echo "<th>" . "Name" . "</th>";
  echo "<th>" . "District" . "</th>";
  echo "<th>" . "Population" . "</th>";
  echo "</tr>";
  foreach ($results2 as $row)
  {
    //if ($_GET['country'] == $row['name'])
    //{
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['district'] . "</td>";
    echo "<td>" . $row['population'] . "</td>";
    echo "</tr>";
    //}
  }
  echo "</table>";
}
else
{
  echo "<table>";
  echo "<tr>";
  echo "<th>" . "Name" . "</th>";
  echo "<th>" . "Continent" . "</th>";
  echo "<th>" . "Independence" . "</th>";
  echo "<th>" . "Head of State" . "</th>";
  echo "</tr>";
  foreach ($results as $row)
  {
    // if ($_GET['country'] == $row['name'])
    // {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['continent'] . "</td>";
    echo "<td>" . $row['independence_year'] . "</td>";
    echo "<td>" . $row['head_of_state'] . "</td>";
    echo "</tr>";
    // }
  }
  echo "</table>";
}



?>