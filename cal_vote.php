<?php
error_reporting(0);
session_start();

if ($_SESSION['userLogin'] != 1) {
    header("location:index.php");
} elseif ($_SESSION['status'] == "voted") {
    header("location:voted.php");
}

// Hardcoded positions and candidates data
$positions = [
    'President' => [
        ['id' => 1, 'cname' => 'John Doe', 'symbol' => 'Eagle', 'symphoto' => 'images/eagle.png', 'tvotes' => 10],
        ['id' => 2, 'cname' => 'Jane Smith', 'symbol' => 'Tiger', 'symphoto' => 'images/tiger.png', 'tvotes' => 15]
    ],
    'Vice President' => [
        ['id' => 3, 'cname' => 'Alice Johnson', 'symbol' => 'Lion', 'symphoto' => 'images/lion.png', 'tvotes' => 5],
        ['id' => 4, 'cname' => 'Bob Brown', 'symbol' => 'Elephant', 'symphoto' => 'images/elephant.png', 'tvotes' => 8]
    ]
];

$i = 0;
$can_id = [];

foreach ($positions as $pos_name => $candidates) {
    $can_id[] = $_POST[$pos_name];
    $id = $can_id[$i];

    // Find the candidate and update the votes
    foreach ($candidates as &$candidate) {
        if ($candidate['id'] == $id) {
            $candidate['tvotes'] += 1;
            echo $candidate['tvotes'];
        }
    }
    $i++;
}

// Update voter status
$_SESSION['status'] = "voted";

// Redirect to the voted page
echo "<script>location.href='voted.php'</script>";
?>
