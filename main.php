<?php
include "db.php";
$sql = "SELECT * FROM photo";
$all_product = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="font.css"> -->
    <title>Main</title>
    <link rel="stylesheet" href="css/main.css">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style>
.uploade{
    width: 200px;
    height: 162px;
}
</style>
</head>
<body> 
    <main>
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
          
        ?>
        <div class="card">
            <div class="images">
                <img class="uploade" src="uploads/<?php echo $row['img_url'] ?>" alt="<?php echo $row['img_url'] ?>">
            </div>
            <div class="caption">
                <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="product">Product Name</p>
                <p class="price">100Rs</p>
                <p class="price"><b>Discount --> <del>10% </del></b></p>
                
                <button>More</button>
            </div>
        </div>
        <?php  } ?>
    </main>
</body>
</html>