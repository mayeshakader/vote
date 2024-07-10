<?php
session_start();
error_reporting(0);

$vot_start_date = '';
$vot_end_date = '';

if(isset($_POST['set']))
{
    $vot_start_date = $_POST['start'];
    $vot_end_date = $_POST['end'];

    echo "<script>alert('Successfully updated');</script>";
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
</head>
<body>
   <div class="container">
        <div class="heading"><h1>Online Voting System</h1></div>
        <div class="form">
            <h4>Voting Schedule</h4>
            <form action="" method="POST">
                <label class="label">Valid From:</label>
                <input type="datetime-local" name="start" class="input" required value="<?php echo $vot_start_date; ?>">

                <label class="label">Valid To:</label>
                <input type="datetime-local" name="end" class="input" required value="<?php echo $vot_end_date; ?>">
                <button class="button" name="set">Set</button>
            </form>
        </div>
   </div>
</body>
</html>
