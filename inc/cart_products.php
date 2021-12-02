<section class="cart-section section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $t = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $product = getProductByID($key);
                            $p = mysqli_fetch_assoc($product);
                            $qty = $value['qty'];
                            $total = ($p['selling_price']) * $qty;
                            $t += $total;


                        ?>
                            <tr>
                                <td>
                                    <a href="javascript:void(0)"><img src="<?php echo "assets/images/products/" . $p['product_image']; ?>" alt="cart" class=" "></a>
                                </td>
                                <td><a href="javascript:void(0)"><?php echo $p['product_name']; ?></a>
                                    <div class="mobile-cart-content">
                                        <div class="col-xs-3">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="number" name="quantity" class="form-control input-number" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color"><?php echo $p['selling_price']; ?></h2>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color"><a href="javascript:void(0)" class="icon">
                                                    <<i class="fa fa-times" aria-hidden="true"></i>
                                                </a></h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2><?php echo $p['selling_price']; ?></h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" onchange="manageCart(<?php echo $key; ?>,this.value,'update')" name=" quantity" class="form-control input-number" value="<?php echo $qty; ?>">
                                        </div>
                                    </div>
                                </td>
                                <td><a href="javascript:void(0)" class="icon"><i onclick="manageCart(<?php echo  $p['product_id']; ?>,1,'remove')" class="fa fa-times"></i>
                                    </a></td>
                                <td>
                                    <h2 class="td-color"><?php echo $total ?></h2>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <table class="table cart-table table-responsive-md">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>
                                        <?php echo $t; ?>
                                    </h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12"><a href="javascript:void(0)" class="btn btn-normal">continue shopping</a> <a href="checkout.php" class="btn btn-normal ms-3">check out</a></div>
        </div>
    </div>
</section>