<?php

include "Connect.php";

// Process form data
if (isset($_POST['submit'])) {
    $Firstname = $_POST['Firstname'];
    $Secondname = $_POST['Secondname'];
    $Email= $_POST['Email'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO candidates (First_name, Second_name, Email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $Firstname, $Secondname, $Email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
        

        // Redirect to index.php after successful insertion
        header("Location: index.php"); 
    
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();




#########################################################################

}
?>
