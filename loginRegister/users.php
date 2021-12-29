<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    // require "DataBaseConfig.php";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "loginregister";
    $usernames = $_SESSION['name'];

    $conn = new mysqli($servername, $username, $password, $databasename);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // $sql = "SELECT * FROM users";
    $sql = "SELECT username FROM users where username= '$usernames'";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {


        while ($row[] = $result->fetch_assoc()) {

            $tem = $row;

            $json = json_encode($tem);
        }
    } else {
        echo "No Results Found.";
    }
    echo $json;
    $conn->close();
}
?>