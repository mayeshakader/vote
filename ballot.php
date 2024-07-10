<?php
session_start();
error_reporting(0);

if ($_SESSION['userLogin'] != 1) {
    header("location:index.php");
}

$start = $_GET['start'];

if ($_SESSION['voted'] == 1 || $_SESSION['status'] == "voted") {
    header("location:voted.php");
}

$positions = [
    [
        'position_name' => 'President',
        'candidates' => [
            [
                'id' => 1,
                'cname' => 'John Doe',
                'symbol' => 'Eagle',
                'symphoto' => 'images/eagle.png'
            ],
            [
                'id' => 2,
                'cname' => 'Jane Smith',
                'symbol' => 'Tiger',
                'symphoto' => 'images/tiger.png'
            ]
        ]
    ],
    [
        'position_name' => 'Vice President',
        'candidates' => [
            [
                'id' => 3,
                'cname' => 'Alice Johnson',
                'symbol' => 'Lion',
                'symphoto' => 'images/lion.png'
            ],
            [
                'id' => 4,
                'cname' => 'Bob Brown',
                'symbol' => 'Elephant',
                'symphoto' => 'images/elephant.png'
            ]
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
        .table {
            margin-top: 1rem;
        }
        .button {
            width: 15rem;
            margin: auto;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading"><h1>Online Voting System</h1></div>
        <div class="header">
            <span class="logo">Voting System</span>
            <span class="profile" onclick="showProfile()">
                <img src="<?php echo $_SESSION['idcard']; ?>" alt="">
                <label><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></label>
            </span>
        </div>
        <div id="profile-panel">
            <i class="fa-solid fa-circle-xmark" onclick="hidePanel()"></i>
            <div class="dp"><img src="<?php echo $_SESSION['idcard']; ?>" alt=""></div>
            <div class="info">
                <h2><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></h2>
            </div>
            <div class="link"><a href="includes/user-logout.php" class="del"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>
        </div>
        <div class="main">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vote</th>
                        <th>Voting Symbol</th>
                        <th>Candidate Name</th>
                        <th>Position</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="cal_vote.php" method="POST">
                        <?php foreach ($positions as $position) : ?>
                            <tr>
                                <td colspan="4"><h2><?php echo $position['position_name']; ?></h2></td>
                            </tr>
                            <?php foreach ($position['candidates'] as $candidate) : ?>
                                <tr>
                                    <td>
                                        <input type="radio" name="<?php echo $position['position_name']; ?>" value="<?php echo $candidate['id']; ?>" class="vote" required>
                                        <label class="check">&#10004;</label>
                                    </td>
                                    <td>
                                        <div class="symbol">
                                            <a href="<?php echo $candidate['symphoto']; ?>">
                                                <img src="<?php echo $candidate['symphoto']; ?>" alt="<?php echo $candidate['symbol']; ?>">
                                            </a>
                                            <div class="bold"><?php echo $candidate['symbol']; ?></div>
                                        </div>
                                    </td>
                                    <td class="large-font"><?php echo $candidate['cname']; ?></td>
                                    <td class="large-font"><?php echo $position['position_name']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4"><button class="button" name="vote">Vote</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        //logout user after 5 minutes
        setTimeout(() => {
            location.replace("includes/user-logout.php");
        }, 300000);

        function showProfile() {
            document.getElementById('profile-panel').style.display = 'block';
        }

        function hidePanel() {
            document.getElementById('profile-panel').style.display = 'none';
        }
    </script>
    <script src="js/script.js"></script>
</body>
</html>
