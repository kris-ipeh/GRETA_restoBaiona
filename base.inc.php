<?php

$base = new PDO(
  "mysql:host=localhost;dbname=resto",
  "seb",
  ""
);

$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
