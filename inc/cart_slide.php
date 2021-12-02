<div id="cart_side" class="add_to_cart top ">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my cart</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeCart()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="cart_media">
            <ul class="cart_product">
                <?php
                foreach ($_SESSION['cart'] as $key => $value) {
                    $productQuery = getProductByID($key);
                    $productData = mysqli_fetch_assoc($productQuery);
                    $qty = $value['qty'];


                ?>
                    <li>
                        <div class="media">
                            <a href="<?php echo  "product.php?id=" . $product_data["product_id"]; ?>">
                                <img alt="megastore1" class="me-3" src="assets/images/layout-2/product/1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="<?php echo  "product.php?id=" . $product_data["product_id"]; ?>">
                                    <h4><?php echo $productData['product_name']; ?></h4>
                                </a>
                                <h6>
                                    <?php echo $productData['selling_price']; ?> <span> <?php echo $productData['mrp']; ?></span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="<?php echo $qty; ?>" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a onclick="editCart(<?php echo $key . ',' . $qty; ?> ,'editCart');" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>

            </ul>
            <ul class="cart_total">
                <li>
                    subtotal : <span>$1050.00</span>
                </li>
                <li>
                    shpping <span>free</span>
                </li>
                <li>
                    taxes <span>$0.00</span>
                </li>
                <li>
                    <div class="total">
                        total<span>$1050.00</span>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="cart.php" class="btn btn-solid btn-sm">view cart</a>
                        <a href="checkout.php" class="btn btn-solid btn-sm ">checkout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>