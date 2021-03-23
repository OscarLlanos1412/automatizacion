<?php
    // $connex = mysqli_connect("localhost", "root", "", "ingreso");
    //conexion a la base de datos 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "supermercado";
    $mysqli = new mysqli ($hostname, $username, $password, $database);
    if($mysqli ->connect_errno)
    {
        die("Fallo la conexion con Mysql" . mysqli_connect_errno());
    }
    session_start(); 
?>