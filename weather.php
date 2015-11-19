<?php include('inc/helpers.php'); ?>
<html>
<header>
  <title>Current Weather</title>
</header>
<body>
  <h1>Current Weather</h1>
<form method="post">

  <label for="city">City:</label>
  <input name="city" placeholder="City" />
  <input type = "submit" />
</form>

<?php

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $url = "http://api.openweathermap.org/data/2.5/forecast?q=".urlencode($_POST['city'])."&mode=json&appid=2de143494c0b295cca9337e1e96b00e0&units=imperial";
    $response = request($url,null, "GET");

    print "City: ".print_r($response->city->name, true)."<br>";
    print "Current Temperature in F: ".print_r($response->list[6]->main->temp, true)."<br>";
    print "Weather: ".print_r($response->list[6]->weather[0]->main, true)."<br>";
  }

 ?>
