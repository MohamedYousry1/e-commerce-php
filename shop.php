<?php
require_once 'inc/header.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header("location:login.php");
    exit();
}
?>

<!-- Start Hero -->

<section id="page-header">
    <h2>Super value deals</h2>
    <p>Save more woth coupons & up to 70% off!</p>
</section>

<!-- End Hero -->
<?php require_once('inc/success.php'); ?>


<!-- Start New Arrival or productCard Features -->
<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modren Desgin</p>
    <div class="pro-container">
        <?php if(isset($_SESSION['productS'])): ?>
            <?php foreach ($_SESSION['productS'] as $product): ?>
                <div class="pro" onclick="window.location.href='product.php'">
                    <img src="admin/upload/<?= $product['imgNewName'];?>" alt="p1 ">
                    <div class="des ">
                        <span><?= $product['category'];?></span>
                        <h5><?= $product['title'];?></h5>
                        <div class="star ">
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <h4>Price: <?= $product['price'];?> LE</h4>
                        <h6>Quantity: <?= $product['quantity'];?></h6>
                        <a href="# " class="cart "><i class="fas fa-shopping-cart "></i></a>
                    </div>
                </div>
        <?php
            endforeach;
        endif; ?>
    </div>
</section>

<section id="pagenation" class="section-p1">

    <a href="# ">1</a>
    <a href="# ">2</a>
    <a href="# "><i class="fas fa-long-arrow-alt-right "></i></a>

</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext ">
        <h4>Sign Up For Newletters</h4>
        <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
    </div>
    <div class="form ">
        <input type="text " placeholder="Enter Your E-mail... ">
        <button class="normal ">Sign Up</button>
    </div>
</section>

<?php require_once 'inc/footer.php'; ?>