<?php
    $con = mysqli_connect("localhost", "id8160341_registerdb", "Jo200403", "id8160341_registerdb");
    
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $alter = $_POST["alter"];
    $email = $_POST["email"];
    $passwort = $_POST["passwort"];
    $telefon = $_POST["telefon"];
    

    $statement = mysqli_prepare($con, "INSERT INTO user (vorname, nachname, email, alter, passwort, telefon) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $vorname, $nachname, $email, $alter, $passwort, $telefon);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
