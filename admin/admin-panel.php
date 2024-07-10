<?php
error_reporting(0);
session_start();

if ($_SESSION['adminLogin'] != 1) {
    header("location:index.php");
    exit();
}

// Hardcoded data for demonstration purposes
$_SESSION["total_voters"] = 100; // Total number of voters
$_SESSION["total_cand"] = 10; // Total number of candidates
$_SESSION["total_position"] = 5; // Total number of positions
$voter_voted = 75; // Number of voters who voted
$total_pos = $_SESSION["total_position"]; // Total number of positions
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
    <script src="../js/chart.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="menu-bar" id="show" onclick="showMenu()">&#9776;</span>
            <span class="menu-bar" id="hide" onclick="hideMenu()">&#9776;</span>
            <span class="logo">Voting System</span>
            <span class="profile" onclick="showProfile()"><img src="../res/10.png" alt=""><label><?php echo $_SESSION['name']; ?></label></span>
        </div>
        <?php include '../includes/menu.php'; ?>
        <div id="profile-panel">
            <i class="fa-solid fa-circle-xmark" onclick="hidePanel()"></i>
            <div class="dp"><img src="../res/10.png" alt=""></div>
            <div class="info">
                <h2><?php echo $_SESSION['name']; ?></h2>
                <h5>Admin</h5>
            </div>
            <div class="link"><a href="../includes/admin-logout.php" class="del"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>
        </div>
        <div id="main">
            <div class="info-box" id="box1">
                <h1><?php echo $_SESSION["total_voters"]; ?></h1>
                <h3>Total Voters</h3>
                <a href="voters.php">More Info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
            <div class="info-box" id="box2">
                <h1><?php echo $_SESSION["total_cand"]; ?></h1>
                <h3>Candidates</h3>
                <a href="candidates.php">More Info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
            <div class="info-box" id="box3">
                <h1><?php echo $_SESSION["total_position"]; ?></h1>
                <h3>No Of Positions</h3>
                <a href="position.php">More Info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
            <!-- <div class="info-box" id="box4">
                <h1><?php echo $voter_voted; ?></h1>
                <h3>Voters Voted</h3>
                <a href="#">More Info <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div> -->
            <div class="result-box">
                <h2 class="result-title">Voting Tally</h2>
                <?php
                    for ($i = 0; $i < $total_pos; $i++) {
                        echo '<div class="result"><canvas class="myChart"></canvas></div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <script>
        var ctx = [];
        var myChart = [];
        <?php
            // Include candidate results script
            // This should generate JavaScript code for displaying charts
            include "../includes/candidate_result.php";
        ?>
    </script>
    <script src="../js/script.js"></script>
</body>
</html>
