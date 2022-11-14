<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$num_params = count($_GET);

$country = filter_input(INPUT_GET, 'query'); 
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
<?php if($num_params == 1): ?>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['continent'] ?></td>
    <td><?php echo $row['independence_year'] ?></td>
    <td><?php echo $row['head_of_state'] ?></td>
  </tr>
<?php endforeach; ?>

<?php elseif($num_params > 1):?>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>

  <?php 
    $countries_list = array();
    foreach ($results as $row):
      $country_code = $row['code']; 
      // echo '<pre>'; print_r($results); echo '</pre>';
      $stmt1 =  $conn->query("SELECT * FROM countries INNER JOIN cities ON cities.country_code = countries.code WHERE cities.country_code = '$country_code'");
      $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    endforeach; ?>
  <?php foreach ($results1 as $row): ?>
  <tr>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['district'] ?></td>
    <td><?php echo $row['population'] ?></td>
  </tr>
<?php endforeach; ?>
<?php endif; ?>

</table>