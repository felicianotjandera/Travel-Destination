<?php
include "includes/config.php";
ob_start();
session_start();

if (isset($_POST["submit"])) {
    $admin_user = $_POST["username"];
    $admin_pass = md5($_POST["password"]);

    $check_query = "SELECT * FROM admin WHERE admin_USER = '$admin_user'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Username already exists. Please choose a different one.');</script>";
    } else {
        $admin_id = uniqid(); 
        $admin_id = substr($admin_id, -2);
      
        $query = "INSERT INTO admin (admin_ID, admin_USER, admin_PASS) VALUES ('$admin_id', '$admin_user', '$admin_pass')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('New admin user added successfully!'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Error adding admin user: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Admin User</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/csslogin.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Add New Admin</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="admin_input.php">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn float-right login_btn">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
ob_end_flush();
?>