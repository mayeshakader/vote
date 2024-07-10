<?php

    error_reporting(0);

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $idname=$_POST['idname'];
    $idnum=$_POST['idnum'];
    $instidnum=$_POST['instidnum'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    if(isset($_POST['register']))
    {
            $con=mysqli_connect("localhost","root","","voting");
            $date1=new DateTime("$dob");
            $date2=new DateTime("now");
            $dateDiff=$date1->diff($date2);
           
            if(strlen($phone)!=11)
            {
                echo "<script> 
                        alert('Phone Number must 11 digit')
                        history.back()
                    </script>";
            }
            else if(!is_numeric($phone))
            {
                echo "<script> 
                        alert('Phone Number must numeric')
                        history.back()
                    </script>";
            }
            else if(strlen($idnum)>13)
            {
                echo "<script> 
                        alert('Enter valid Id number')
                        history.back()
                    </script>";
            }
            else if($dateDiff->days<6570)
            {
                echo "<script>
                        alert('Your age must above 18 years')
                        history.back()
                    </script>";
            }
            else
            {
                $filename=$_FILES["idcard"]["name"];
                $tempname=$_FILES["idcard"]["tmp_name"];
                $folder="img/".$count.$filename;
                move_uploaded_file($tempname,$folder);


                // if($data)
                {
                   echo"<script>
                            alert('Registration Sussessfully!')
                            location.href='index.php'
                        </script>";
                }
            
             }
    }

?>