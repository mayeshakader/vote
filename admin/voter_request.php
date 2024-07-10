<?php
session_start();
error_reporting(0);
if($_SESSION['adminLogin']!=1) {
    header("location:index.php");
    exit();
}

// Hardcoded voter request data
$voter_requests = [
    [
        'id' => 1,
        'vname' => 'Tasmiah Iqbal',
        'idname' => 'National ID',
        'idcard' => 'path/to/idcard1.jpg',
        'dob' => '2000-06-20',
        'old_phno' => '1234567890',
        'new_phno' => '0987654321'
    ],
    [
        'id' => 2,
        'vname' => 'Ramisa Salwa',
        'idname' => 'Passport',
        'idcard' => 'path/to/idcard2.jpg',
        'dob' => '1992-02-02',
        'old_phno' => '2345678901',
        'new_phno' => '9876543210'
    ],
    // Add more voter requests as needed
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
        .del, .edit, .verify {
            display: block;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .verify {
            background-color: royalblue;
        }
        td {
            padding: 1rem;
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
        <?php include '../includes/menu.php'; ?>
        <div id="profile-panel">
            <i class="fa-solid fa-circle-xmark" onclick="hidePanel()"></i>
            <div class="dp"><img src="../res/user3.jpg" alt=""></div>
            <div class="info">
                <h2><?php echo $_SESSION['name']; ?></h2>
                <h5>Admin</h5>
            </div>
            <div class="link"><a href="../includes/admin-logout.php" class="del"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>
        </div>
        <div id="main">
            <div class="heading"><h2>Voter Requests</h2></div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>ID Name</th>
                        <th>ID Card</th>
                        <th>DOB</th>
                        <th>Old Phone No</th>
                        <th>New Phone No</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($voter_requests as $request): ?>
                        <tr>
                            <td><?php echo $request['vname']; ?></td>
                            <td><?php echo $request['idname']; ?></td>
                            <td><a href="<?php echo $request['idcard']; ?>"><img src="<?php echo $request['idcard']; ?>" alt="ID Card"></a></td>
                            <td><?php echo $request['dob']; ?></td>
                            <td><?php echo $request['old_phno']; ?></td>
                            <td><?php echo $request['new_phno']; ?></td>
                            <td><a href="#" class="del" onclick="return delconfirm();"><i class="fa-solid fa-trash-can"></i> Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/script.js"></script>
    <script>
        function delconfirm() {
            return confirm('Delete this Voter?');
        }
    </script>
</body>
</html>
