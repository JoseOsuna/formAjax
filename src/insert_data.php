<?php

include "config.php";


$name        = $_POST["name"];
$lastname    = $_POST["lastname"];
$email       = $_POST["email"];
$phone       = $_POST["phone"];
$comentario  = $_POST["comentario"];

$sql = "INSERT INTO comentarios (name, lastname, email, phone, comentario)
        VALUES ('$name', '$lastname', '$email', '$phone', '$comentario')";


if (mysqli_query($conn, $sql)) {
    $texto = "New record created successfully";
} else {
    $texto =  "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

echo $texto;
