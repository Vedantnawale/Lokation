<?php
include "db.php";
session_start();
$username = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit']) && isset($_FILES['pic'])) {
        echo "Hello";
        echo "<pre>";
        print_r($_FILES['pic']);
        echo "</pre>";

        $img_name = $_FILES['pic']['name'];
        $img_size = $_FILES['pic']['size'];
        $tmp_name = $_FILES['pic']['tmp_name'];
        $error = $_FILES['pic']['error'];
        $plot = $_POST['plotno'];
        $mycity = $_POST['mycity'];
        $add = $_POST['add'];
        $rent = $_POST['rent'];
        $num = $_POST['mobile'];

        if ($error == 0) {
            if ($img_size > 6148139) {
                echo "Size is too large";
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $imh_upload_path = 'uploads/' . $new_img_name;
                    move_uploaded_file($tmp_name, $imh_upload_path);

                    //insert in database
                    $sql = " INSERT INTO `photo` (`img_url`) VALUES ('$new_img_name')";
                    $sql = "INSERT INTO `add` ( `city`, `address`, `img_url`, `price`, `mobile`, `home_no`, `owner`) VALUES ('$mycity', ' $add', '$new_img_name', '$rent', '$num', '$plot', '$username')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        header("location: property.php");
                    }
                } else {
                    echo "You cannot upload this file type";
                }
            }
        } else {
            echo "Unknown error occure";
        }
    } else {
        // echo "Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Pict</title>
    <link rel="stylesheet" href="css/style3.css">
    <style>
        .pic {
            display: flex;
            position: relative;
            text-align: center;
            justify-content: center;
            justify-items: center;

        }

        .pic1 {
            width: 240px;
        }

        .button {
            width: 70px;
        }
    </style>
</head>

<body>
    <!-- uploading a profile pic -->
    <!-- <form action="profile-pic.php" method="post" class="pic" enctype="multipart/form-data">
        <input type="file" name="pic" class="pic1">
        <input type="submit" name="submit" value="upload" class="button">
        
    </form> -->
    <div class="update-profile">
        <form action="add.php" method="post" enctype="multipart/form-data" class="needs-validation">
            <div class="flex">
                <div class="inputBox">
                    <span>City</span>
                    <select name="mycity" id="mycity" class="box">
                        <option value="Akola">Akola</option>
                        <option value="Amravati">Amravati</option>
                        <option value="Yavatmal">Yavatmal</option>
                    </select>
                    <span>Plot Size(sqft):</span>
                    <input type="text" name="plotno" id="plot" class="box" placeholder="Enter plot no">
                    <span>Type :</span>
                    <select name="myfield" id="field" class="box">
                        <option value="1BHK" select>1BHK</option>
                        <option value="2BHK">2BHK</option>
                        <option value="Single Room">Single Room</option>
                        <option value="other">Other</option>
                    </select>
                    <span>Upload home pic :</span>
                    <input type="file" name="pic" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" name="add" id="add" class="box" placeholder="Enter your address" required>
                    <span>Rent:</span>
                    <input type="number" name="rent" id="rent" class="box" placeholder="Enter rent" required>
                    <span>Mobile:</span>
                    <input type="text" class="box"  name="mobile" minlength="10" maxlength="10"  placeholder="Enter Your Mobile No" required>
                    <span>Girls/Boys :</span>
                    <select name="myfield" id="field" class="box">
                        <option value="Boys" select>Boys</option>
                        <option value="Girls">Girls</option>
                    </select>
    
    <!-- <div class="valid-feedback">
    </div> -->
  
                </div>
            </div>
            <input type="submit" name="submit" value="upload" class="btn" required>
            <a href="property.php" class="delete-btn">go back</a>
        </form>



    </div>
</body>

</html>