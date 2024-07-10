<?php
session_start();
error_reporting(0);

if ($_SESSION['userLogin'] != 1) {
    header("location:index.php");
}

// Hardcoded data
$vot_start_date = "2024-07-10T06:00:00";  // Example start date
$vot_end_date = "2024-07-10T06:08:00";    // Example end date

$_SESSION['status'] = 'voted';

// Hardcoded user data (for example purposes)
$_SESSION['fname'] = 'John';
$_SESSION['lname'] = 'Doe';
$_SESSION['idcard'] = 'path/to/user_image.jpg';  // Replace with actual image path
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="js/chart.js"></script>
    <style>
        .result-box {
            display: none;
        }
        h4.heading {
            color: tomato;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="logo">Voting System</span>
            <span class="profile" onclick="showProfile()">
                <img src="<?php echo $_SESSION['idcard']; ?>" alt="">
                <label><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></label>
            </span>
        </div>
        <div id="profile-panel">
            <span class="fa-solid fa-circle-xmark" onclick="hidePanel()"></span>
            <div class="dp"><img src="<?php echo $_SESSION['idcard']; ?>" alt=""></div>
            <div class="info">
                <h2><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></h2>
            </div>
            <div class="link">
                <a href="includes/user-logout.php" class="del"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </div>
        <h2 class="heading center">Your vote Submitted Successfully!</h2>
        <h4 class="heading">Result Show After Voting ends</h4>
        <div class="result-box">
            <h2 class="result-title">Voting Result</h2>
            <?php
                $total_pos = 3;  // Example total positions
                for ($i = 0; $i < $total_pos; $i++) {
                    echo '<div class="result"><canvas class="myChart"></canvas></div>';
                }
            ?>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script>
        // PHP to JS variable
        var vot_start_date = "<?php echo $vot_start_date; ?>";
        var vot_end_date = "<?php echo $vot_end_date; ?>";
        console.log(vot_end_date);

        // Convert to milliseconds
        var start_date = Date.parse(vot_start_date);
        var end_date = Date.parse(vot_end_date);
        var current_date = Date.parse(new Date());

        var start_vot = start_date - current_date;
        var end_vot = end_date - current_date;

        var vresult = document.getElementsByClassName("result-box");
        var heading = document.getElementsByClassName("heading");

        // Start voting
        setTimeout(() => {
            vresult[0].style.display = "none";
        }, start_vot);

        // End voting
        setTimeout(() => {
            vresult[0].style.display = "block";
            heading[1].style.display = "none";
        }, end_vot);

        // Voting result
        var ctx = [];
        var myChart = [];
        // Example candidate result data
        var candidate_results = [
            { name: "Candidate 1", votes: 100 },
            { name: "Candidate 2", votes: 200 },
            { name: "Candidate 3", votes: 150 }
        ];
        candidate_results.forEach((candidate, index) => {
            ctx[index] = document.getElementsByClassName("myChart")[index].getContext('2d');
            myChart[index] = new Chart(ctx[index], {
                type: 'bar',
                data: {
                    labels: [candidate.name],
                    datasets: [{
                        label: 'Votes',
                        data: [candidate.votes],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
