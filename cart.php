<?php require_once 'inc/header.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header("location:login.php");
    exit();
} ?>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Coupon</h3>
        <input type="text" placeholder="Enter coupon code">
        <button class="normal">Apply</button>
    </div>
    <div id="subTotal">
        <h3>Cart totals</h3>
        <table>
            <tr>
                <td>Subtotal</td>
                <td>$118.25</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>$0.00</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>$0.00</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>$118.25</strong></td>
            </tr>
        </table>
        <button class="normal">proceed to checkout</button>
    </div>
</section>

<?php require_once 'inc/footer.php'; ?>