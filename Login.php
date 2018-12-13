<?php
    $con = mysqli_connect("localhost", "id8160341_registerdb", "Jo200403", "id8160341_registerdb");
    
    $username = $_POST["email"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $email, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $vorname, $alter, $nachname, $password, $email, $telefon);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["vorname"] = $vorname;
        $response["nachname"] = $nachname;
        $response["alter"] = $alter;
        $response["password"] = $password;
        $response["telefon"] = $telefon;
        $response["email"] = $email;
      
    }
    
    echo json_encode($response);
?>
