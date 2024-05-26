<?php include "db/dbcon-pdo.php" ?>
<?php include "assets/header.php" ?>

    <!-- display success when inserting is done correctly -->
    <?php        
        if(isset($_GET['insert_msg'])){
            echo 
            "<section class='container-fluid p-0'>
                <div class='bg-success p-2'>
                    <div class='container text-white text-center fw-bold'>
                        <h6 class='text-center'>".$_GET['insert_msg']."</h6>
                    </div>
                </div>
            </section>";
        }       
    ?>

    <!-- display success when editing is done correctly -->
    <?php        
        if(isset($_GET['update_msg'])){
            echo 
            "<section class='container-fluid p-0'>
                <div class='bg-success p-2'>
                    <div class='container text-white text-center fw-bold'>
                        <h6 class='text-center'>".$_GET['update_msg']."</h6>
                    </div>
                </div>
            </section>";
        }       
    ?>

    <!-- display success when deleting a product is done correctly -->
    <?php        
        if(isset($_GET['delete_msg'])){
            echo 
            "<section class='container-fluid p-0'>
                <div class='bg-success p-2'>
                    <div class='container text-white text-center fw-bold'>
                        <h6 class='text-center'>".$_GET['delete_msg']."</h6>
                    </div>
                </div>
            </section>";
        }       
    ?>

    <!-- display message when validating new product is done incorrectly -->
    <?php        
        if(isset($_GET['message'])){
            echo 
            "<section class='container-fluid p-0'>
                <div class='bg-danger p-2'>
                    <div class='container text-white text-center fw-bold'>
                        <h6 class='text-center'>".$_GET['message']."</h6>
                    </div>
                </div>
            </section>";
        }       
    ?>
<?php include "assets/hero.php" ?>
<div class="container">
    <section class="row mt-5 mb-2">
        <h1 class="fw-bold text-center">Shop Your Favorite Products</h1>
    </section>

    <section class="row">

    <?php 
            try {
                $sql = 'SELECT * FROM products';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>  
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                            <div class="card border-0 p-2 rounded-0 bg-body-secondary py-4" id="product-<?php echo $row['prodid']; ?>">
                                <div class="d-flex justify-content-center">
                                    <img src="<?php echo $row['prodimage']; ?>" class="card-img-top" alt="<?php echo $row['prodname']; ?>" style="width: 150px;">
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5 class="card-title mb-1"><?php echo $row['prodname']; ?></h5>
                                        <p class="card-text mb-1 fw-bold">$<?php echo $row['prodprice']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-evenly">
                                            <p>5 <span style="color:#ffa41c">&#9733;&#9733;&#9733;&#9733;&#9733;</span></p>
                                            <p class="ms-3"><?php echo $row['prodreviewcount'] ?> ratings</p>
                                    </div>
                                    <div class="col-12 pt-2 pb-2">
                                        <a href="db/product.php?id=<?php echo $row['prodid']; ?>" class="btn btn-info w-100">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }catch (PDOException $e) {
                // Handle the exception
                echo "Connection failed: " . $e->getMessage();
            }           
    ?>

    </section>
        
<?php include "assets/footer.php" ?>