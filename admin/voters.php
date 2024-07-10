<?php
session_start();
error_reporting(0);

if ($_SESSION['adminLogin'] != 1) {
    header("location:index.php");
    exit();
}

// Hardcoded voters data
$voters = [
    [
        'fname' => 'Shahriar',
        'lname' => 'Arafat',
        'idname' => 'Passport',
        'idnum' => 'A12345678',
        'idcard' => 'path/to/idcard1.jpg',
        'inst_id' => 'INST001',
        'dob' => '2000-01-01',
        'gender' => 'Male',
        'phone' => '1234567890',
        'address' => '273,Bansree',
        'status' => 'active',
        'verify' => 'yes',
    ],
    [
        'fname' => 'Omiya',
        'lname' => 'Binte',
        'idname' => 'NID card',
        'idnum' => 'D87654321',
        'idcard' => 'path/to/idcard2.jpg',
        'inst_id' => 'INST002',
        'dob' => '2000-02-02',
        'gender' => 'Female',
        'phone' => '0987654321',
        'address' => '456 ,Dhanmondi',
        'status' => 'inactive',
        'verify' => 'no',
    ],
    // Add more voters as needed
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
            <div class="heading"><a href="../registration.php" class="add-btn" onclick="showForm()">+ Add</a><h2>Voters Information</h2></div>
            <div class="heading"><h2 style="background:royalblue;">Verified Voters</h2></div>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Id Number</th>
                    <th>ID Card</th>
                    <th>Institute ID No</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($voters as $voter) {
                        if ($voter['verify'] == 'yes') {
                            echo "<tr>
                            <td>{$voter['fname']} {$voter['lname']}</td>
                            <td><h4>{$voter['idname']}</h4>{$voter['idnum']}</td>
                            <td><a href='../{$voter['idcard']}'><img src='../{$voter['idcard']}'></a></td>
                            <td>{$voter['inst_id']}</td>
                            <td>{$voter['dob']}</td>
                            <td>{$voter['gender']}</td>
                            <td>{$voter['phone']}</td>
                            <td>{$voter['address']}</td>
                            <td>{$voter['status']}</td>
                            <td>
                                <a href='#' style='display:none' class='del verify' onclick='return validconfirm()'><i class='fa-solid fa-check'></i> Verify</a>
                               
                                <a href='#' class='del' onclick='return delconfirm()'><i class='fa-solid fa-trash-can'></i> Delete</a>
                            </td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="heading"><h2 style="background:royalblue;">Not Verified Voters</h2></div>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Id Number</th>
                    <th>ID Card</th>
                    <th>Institute ID No</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($voters as $voter) {
                        if ($voter['verify'] != 'yes') {
                            echo "<tr>
                            <td>{$voter['fname']} {$voter['lname']}</td>
                            <td><h4>{$voter['idname']}</h4>{$voter['idnum']}</td>
                            <td><a href='../{$voter['idcard']}'><img src='../{$voter['idcard']}'></a></td>
                            <td>{$voter['inst_id']}</td>
                            <td>{$voter['dob']}</td>
                            <td>{$voter['gender']}</td>
                            <td>{$voter['phone']}</td>
                            <td>{$voter['address']}</td>
                            <td>{$voter['status']}</td>
                            <td>
                                <a href='#' class='del verify' onclick='return validconfirm()' style='display: block;'><i class='fa-solid fa-check'></i> Verify</a>
                                
                                <a href='#' class='del' onclick='return delconfirm()'><i class='fa-solid fa-trash-can'></i> Delete</a>
                            </td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/script.js"></script>
    <script>
        function delconfirm() {
            return confirm('Delete this Voter?');
        }

        function validconfirm() {
            return confirm('Validate this Voter?');
        }
    </script>
</body>
</html>
