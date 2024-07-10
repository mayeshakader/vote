<?php
session_start();
if ($_SESSION['adminLogin'] != 1) {
    header("location:index.php");
    exit();
}

// Hardcoded positions data
$positions = [
    ['id' => 1, 'position_name' => 'Chairman'],
    ['id' => 2, 'position_name' => 'Vice Chairman'],
    ['id' => 3, 'position_name' => 'Councilor'],
    // Add more positions as needed
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <style>
       .table td {
           height: 2rem;
       }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="menu-bar" id="show" onclick="showMenu()">&#9776;</span>
            <span class="menu-bar" id="hide" onclick="hideMenu()">&#9776;</span>
            <span class="logo">Voting System</span>
            <span class="profile" onclick="showProfile()"><img src="../res/user3.jpg" alt=""><label><?php echo $_SESSION['name']; ?></label></span>
        </div>
        <div id="profile-panel">
            <i class="fa-solid fa-circle-xmark" onclick="hidePanel()"></i>
            <div class="dp"><img src="../res/user3.jpg" alt=""></div>
            <div class="info">
                <h2><?php echo $_SESSION['name']; ?></h2>
                <h5>Admin</h5>
            </div>
            <div class="link"><a href="../includes/admin-logout.php" class="del"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>
        </div>
        <?php include '../includes/menu.php'; ?>
        <div id="main">
            <div class="heading"><a href="add_position.php" class="add-btn">+ Add</a><h2>Positions</h2></div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($positions as $position): ?>
                        <tr>
                            <td><?php echo $position['position_name']; ?></td>
                            <td>
                                <a href="pos_update.php?psnm=<?php echo $position['position_name']; ?>&id=<?php echo $position['id']; ?>" class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <a href="#" class="del" onclick="return delconfirm()"><i class="fa-solid fa-trash-can"></i> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/script.js"></script>
    <script>
        function delconfirm() {
            return confirm('Delete this Position?');
        }
    </script>
</body>
</html>
