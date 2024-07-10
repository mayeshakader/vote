<?php
error_reporting(0);
session_start();
$_SESSION['error'] = "";

$hardcodedEmail = "mayeshakader13@gmail.com";
$hardcodedPassword = "123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $hardcodedEmail && $password === $hardcodedPassword) {
        $_SESSION['email'] = $hardcodedEmail;
        $_SESSION['name'] = "Admin";
        $_SESSION['adminLogin'] = 1;
        header("Location: admin-panel.php");
        exit();
    } else {
        $_SESSION['error'] = "Wrong email or password!";
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
   <div class="container">
        <div class="heading"><h1>Online Voting System</h1></div>
        <div class="form">
            <h4>Admin Login</h4>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <label class="label">Email Id:</label>
                <input type="email" name="email" class="input" placeholder="Enter Email id" required>

                <label class="label">Password:</label>
                <input type="password" name="password" class="input" placeholder="Enter Password" required>

                <button class="button" name="login">Login</button>
            </form>
            <p class="error"><?php echo $_SESSION['error']; ?></p>
        </div>
   </div>
</body>
</html>
