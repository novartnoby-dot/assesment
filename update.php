<?php
include "Connect.php";

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $Firstname = $_POST['Firstname'];
    $Secondname = $_POST['Secondname'];
    $Email = $_POST['Email'];

    $stmt = $conn->prepare("UPDATE candidates SET Firstname=?, Secondname=?, Email=? WHERE id=?");
    $stmt->bind_param("sssi", $Firstname, $Secondname, $Email, $id);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo "Record updated successfully.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>