<?php include("inc/header.php");
include_once("inc/functions.php");
?>
<!-- Page Header Ends -->
<?php include("inc/sidebar.php");

?>
<!-- Page Sidebar Ends-->

<!-- Right sidebar Start-->
<?php include("inc/right_sidebar.php");
$product_data = getProducts();
$product = array();
while ($data = mysqli_fetch_assoc($product_data)) {
  $product[] = $data;
}

?>


<div class="page-body">
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          <div class="page-header-left">
            <h3>
              Product List
              <small>Bigdeal Admin panel</small>

            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item">
              <a href="index.html"><i data-feather="home"></i></a>
            </li>
            <li class="breadcrumb-item">Physical</li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row products-admin ratio_asos">
      <!-- product detail start -->

      <?php
      foreach ($product as $pro_data) {

      ?>
        <div class="col-xl-3 col-sm-6">
          <div class="card product">
            <div class="card-body">
              <div class="product-box p-0">
                <div class="product-imgbox">
                  <div class="product-front">
                    <img src="<?php echo  "../assets/images/products/" . $pro_data['product_image']; ?>" class="img-fluid" alt="product" />
                  </div>
                  <div class="product-back">
                    <img src="<?php echo  "../assets/images/products/" . $pro_data['product_image']; ?>" class="img-fluid" alt="product" />
                  </div>
                  <div class="product-icon icon-inline">
                    <button>
                      <i class="ti-bag"></i>
                    </button>
                    <a href="javascript:void(0)" title="Add to Wishlist">
                      <i class="ti-heart" aria-hidden="true"></i>
                    </a>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#quick-view" title="Quick View">
                      <i class="ti-search" aria-hidden="true"></i>
                    </a>
                    <a href="javascript:void(0)" title="Compare">
                      <i class="fa fa-exchange" aria-hidden="true"></i>
                    </a>
                  </div>
                  <div class="new-label1">
                    <div>new</div>
                  </div>
                  <div class="on-sale1">on sale</div>
                </div>
                <div class="product-detail detail-inline p-0">
                  <div class="detail-title">
                    <div class="detail-left">
                      <div class="rating-star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                      <a href="javascript:void(0)">
                        <h6 class="price-title">
                          <?php echo implode(' ', array_slice(str_word_count($pro_data['product_name'], 2), 0, 2)) . "..."; ?>
                        </h6>
                      </a>
                    </div>
                    <div class="detail-right">
                      <div class="check-price"><?php echo  "Rs" . $pro_data['mrp']; ?></div>
                      <div class="price">
                        <div class="price"><?php echo "Rs" . $pro_data['selling_price']; ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- product detail end -->
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>

<!-- footer start-->
<?php include("inc/footer.php");

?>