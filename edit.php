<?php 
include "Connect.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Student Information editing</h1>
    <?php
    if (isset($_GET['edit'])) {
        $id = (int) $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM apps WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $edit_data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        foreach ($edit_data as $edit) {
            ?>
            <form action="index.php?id=<?php echo $edit['id']; ?>" method="POST">
                <label for="Firstname">First Name:</label><br>
                <input type="text" id="Firstname" name="Firstname" placeholder="Enter your first name"  value="<?php echo htmlspecialchars($edit['Firstname']); ?>"><br>

                <label for="Secondname">Secondname:</label><br>
                <input type="text" id="Secondname" name="Secondname" placeholder="Enter your second name" value="<?php echo htmlspecialchars($edit['Secondname']); ?>"><br>

                <label for="Email">Email:</label><br>
                <input type="email" id="Email" name="Email" placeholder="Enter your email" value="<?php echo htmlspecialchars($edit['Email']); ?>">

                <button type="submit" name="submit" value="Update">Update</button><br>
            </form>
            <?php
        }
    } else {
        echo "No ID parameter provided in the URL.";
    }
    ?>

</body>
</html>