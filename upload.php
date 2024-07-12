<?php
include "DbConnect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST["Title"]) && isset($_POST["Caption"]) && isset($_POST["Date"]) && isset($_POST["Time"]) && isset($_POST["City"]) && isset($_POST["Address"]) && isset($_POST["Zipcode"])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $title = validate($_POST['Title']); 
    $caption = validate($_POST['Caption']);
    $genre = validate($_POST['Genre']);  
    $date = validate($_POST['Date']);
    $time = validate($_POST['Time']);
    $city = validate($_POST['City']); 
    $address = validate($_POST['Address']);
    $zipcode = validate($_POST['Zipcode']);
    $user_id = $_SESSION['Id'];

    $insertUserQuery = "INSERT INTO Posts (Title, Caption, Genre, Date, Time, City, Address, Zipcode, User_Id) VALUES ('$title', '$caption', '$genre', '$date', '$time', '$city', '$address', '$zipcode', $user_id)";

    echo "Query: $insertUserQuery<br>";

    $result = mysqli_query($conn, $insertUserQuery) or die(mysqli_error($conn));

    if ($result) {
        header('Location: sucess.php? type=upload');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Field forms";
}
?>