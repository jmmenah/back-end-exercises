<?php

require __DIR__ . '/vendor/autoload.php';

use League\Csv\Reader;

$pdo = new PDO('sqlite:'.__DIR__.'/nombres.db');
$table = "CREATE TABLE IF NOT EXISTS nombres (
  nombre VARCHAR(35) NOT NULL,
  frecuencia INT NOT NULL,
  fmil REAL NOT NULL,
  sexo VARCHAR(35) NOT NULL,
  PRIMARY KEY (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$pdo->query($table);

$stmt = $pdo->prepare("INSERT INTO nombres (nombre, frecuencia, fmil,se) VALUES (:nombre, :frecuencia, :fmil, :sexo)");

$csv1 = Reader::createFromPath('nombres_100_hombres.csv')->setHeaderOffset(0)->setDelimiter(':');
$csv2 = Reader::createFromPath('nombres_100_mujeres.csv')->setHeaderOffset(0)->setDelimiter(':');

//by setting the header offset we index all records
//with the header record and remove it from the iteration

function csvReader($csv,$type){
  foreach ($csv as $record) {
      print_r($record);
      echo "<br>";
      //Do not forget to validate your data before inserting it in your database
      $stmt->bindValue(':nombre', $record['nombre'], PDO::PARAM_STR);
      $stmt->bindValue(':frecuencia', $record['frecuencia'], PDO::PARAM_INT);
      $stmt->bindValue(':fmil', $record['fmil'], PDO::PARAM_INT);
      if($type=='hombre'){
      $stmt->bindValue(':sexo', 'hombre', PDO::PARAM_INT);
      }else{
        $stmt->bindValue(':sexo', 'mujer', PDO::PARAM_INT);
      }
      $stmt->execute();
  }
}
csvReader($csv1,'hombre');
csvReader($csv2,'mujer');

