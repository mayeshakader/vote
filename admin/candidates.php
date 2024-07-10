<?php
session_start();
if ($_SESSION['adminLogin'] != 1) {
    header("location:index.php");
    exit();
}

// Hardcoded candidates data
$candidates = [
    [
        'cname' => 'Mr.Rahim',
        'symbol' => 'Nouka',
        'symphoto' => '../res/nouka.png',
        'position' => 'President',
        'tvotes' => 1200,
    ],
    [
        'cname' => 'Mr.Karim',
        'symbol' => 'Eagle',
        'symphoto' => '../res/egal.png',
        'position' => 'Vice President',
        'tvotes' => 900,
    ],
    // Add more candidates as needed
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
        .form {
            position: absolute;
            background: #fff;
            border-radius: 0rem;
            box-shadow: none;
            margin: 1rem;
            height: 0rem;
        }
        .add-btn {
            text-decoration: none;
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
            <div class="heading"><a href="cand-register.php" class="add-btn">+ Add</a><h2>Candidates Information</h2></div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Candidate Name</th>
                        <th>Candidate Symbol</th>
                        <th>Symbol Image</th>
                        <th>Position</th>
                        <th>Total Votes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($candidates as $candidate): ?>
                        <tr>
                            <td><?php echo $candidate['cname']; ?></td>
                            <td><?php echo $candidate['symbol']; ?></td>
                            <td><a href="<?php echo $candidate['symphoto']; ?>"><img src="<?php echo $candidate['symphoto']; ?>" alt="<?php echo $candidate['symbol']; ?>"></a></td>
                            <td><?php echo $candidate['position']; ?></td>
                            <td><?php echo $candidate['tvotes']; ?></td>
                            <td>
                               
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
            return confirm('Delete this Candidate?');
        }
    </script>
</body>
</html>
