<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Web Data of student</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <h1>Student Information</h1>
    <form action="db.php" method="POST">
    <label for="Firstname">First Name:</label><br>
    <input type="text" id="Firstname" name="Firstname" Placeholder="Enter your first name" required><br>

    <label for="Secondname">Secondname:</label><br>
    <input type="text" id="Secondname" name="Secondname" Placeholder="Enter your second name" required><br>

    <label for="Email">Email:</label><br>
    <input type="email" id="Email" name="Email" Placeholder="Enter your email" required><br>

    <button type="submit" name="submit">Submit</button>
    </form>

     <hr>
     <h2>Student Data</h2>
     <border>
     <table border="6">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <body>
            <?php
            include "Connect.php";
            $sql = "SELECT * FROM candidates";
            $result = $conn->query($sql);

            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['Firstname']; ?></td>
                    <td><?php echo $row['Secondname']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><button><a href="view.php?id=<?php echo $row['id']; ?>">view</a></button></td>
                    <td><button><a href="update.php?id=<?php echo $row['id']; ?>">update</a></button></td>
                    <td><button><a href="delete.php?id=<?php echo $row['id']; ?>">delete</a></button></td>
                    <td><button><a href="edit.php?edit=<?php echo $row['id']; ?>">edit</a></button></td>
                </tr>
            <?php }
            $conn->close();
            ?>
        </body>
     </table>
  

</body>
</html>