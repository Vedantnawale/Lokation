<?php 
$delete=false;
include 'db.php';
session_start();
$username=$_SESSION['username'];
$sql = "SELECT * FROM `add` WHERE owner ='$username'";
$all_product = $conn->query($sql);

//delete add
if(isset($_GET['delete'])){
   $sno = $_GET['delete'];
   $delete = true;
   $sql = "DELETE FROM `add` WHERE `id` = $sno";
   $result = mysqli_query($conn, $sql);
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
     <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style2.css">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

<!-- swiper css link  -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
<style>
      .btn {
         display: inline-block;
         font-weight: 400;
         line-height: 1.5;
         color: #666565;
         text-align: center;
         vertical-align: middle;
         cursor: pointer;
         user-select: none;
         background-color: transparent;
         border: 1px solid transparent;
         padding: 0.375rem 0.75rem;
         font-size: 2rem;
         border-radius: 5px;
         transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      }
      .packages .box-container .box{
   border:var(--border);
   box-shadow: var(--box-shadow);
   background: var(--white);
   display: inline-block;
}
::-webkit-scrollbar {
        width: 5px;
      }
      ::-webkit-scrollbar-thumb {
        background: #33c7a5;
      }

      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }
      .py-3{
         margin-top: 0px;
      }
      .packages .box-container .box .content p {
    font-size: 1.5rem;
    color: #47a18c;
    line-height: 2;
    padding: 1rem 0;
}
   </style>
</head>
<body>
    <?php include 'nav2.php' ?>
   <!-- packages section starts  -->
   <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your add has been deleted successfully
  </div>";
  }
  ?>
   <section class="packages">

      <h1 class="heading-title">Your Posted Advertisements</h1>

      <div class="box-container">
         <?php
          $sno = 0;
         while ($row = mysqli_fetch_assoc($all_product)) {
            $sno = $sno + 1;
         ?>
            <div class="box">
               <div class="image">
                  <img src="uploads/<?php echo $row['img_url']; ?>" alt="">
               </div>
               <div class="content">
                  <h3><b><?php echo $row['city']; ?></b></h3>
                  <p><?php echo $row['address']; ?><br> plot size-> <b><?php echo $row['home_no']; ?>sqft</b><br>
                     <span> Price--> <b>₹ <?php echo $row['price']; ?></b></span><br>
                     <span>Contact--><b><?php echo $row['mobile']; ?></b></span>
                   
                  </p>
                  <?php
                  echo "<button class='delete btn btn-sm btn-danger' id=".$row['id']." style='font-size: 2rem;'>Delete</button> " ?>
                              </div>
            </div>

         <?php  } ?>


      </div>
      <script>

//script for dele add
          deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `view.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
      </script>
</body>
</html>