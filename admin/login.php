<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}

require "../koneksi.php";

if(isset($_POST["login"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];  

    $result = mysqli_query($connn, "SELECT * FROM admin WHERE username = '$username'"); 

    //cek username -> pake itu untuk hitung ada brp baris 
    //yang dikembalikan SELECT kalo ketemu 1, kalo gada 0
    if(mysqli_num_rows($result)===1){

        //cek password
        $row = mysqli_fetch_assoc($result);

        //set session
        $_SESSION["login"] = true;
        
        if(password_verify($password, $row["password"]) ) {
            header("Location: index.php");
            exit;
        }
    } 

    $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>