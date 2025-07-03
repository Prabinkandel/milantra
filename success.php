<?php
session_start();
include("Database/connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nm'];
    $email = $_POST['email'];
    $mo = $_POST['mo'];
    $date = $_POST['date'];
    $theme = $_POST['theme'];
    $theme_name = $_POST['theme'];
    $price = $_POST['price'];

    // Optional: sanitize inputs using mysqli_real_escape_string if needed
    $q = mysqli_query($conn, "INSERT INTO booking(nm, email, mo, theme, thm_nm, price, date)
        VALUES ('$name', '$email', '$mo', '$theme', '$theme_name', '$price', '$date')");

    if ($q) {
        echo "Booking successful! Thank you.";
    } else {
        echo "Booking failed after payment.";
    }
} else {
    echo "Invalid access.";
}
?>
