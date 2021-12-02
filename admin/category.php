<?php include("inc/header.php");
include("inc/functions.php");
$cats = getCategories();
$category = array();
while ($cat_data = mysqli_fetch_assoc($cats)) {
  $category[] = $cat_data;
}

?>
<!-- Page Header Ends -->
<?php include("inc/sidebar.php") ?>
<!-- Page Sidebar Ends-->

<!-- Right sidebar Start-->
<?php include("inc/right_sidebar.php") ?>
<!-- Right sidebar Ends-->

<div class="page-body">
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          <div class="page-header-left">
            <h3>
              Category
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
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Products Category</h5>
          </div>
          <div class="card-body">
            <div class="btn-popup pull-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">
                Add Category
              </button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title f-w-600" id="exampleModalLabel">
                        Add Physical Product
                      </h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="needs-validation" action="inc/ajax/manage_cat.php" id="addCat">
                        <div class="form">
                          <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Category Name :</label>
                            <input name="cat_title" class="form-control" id="cat_name" type="text" />
                          </div>

                          <div class="form-group mb-0">
                            <label for="validationCustom02" class="mb-1">Category Image :</label>
                            <input name="cat_image" class="form-control" id="cat_image" type="file" />
                          </div>
                          <div class="form-group" style="display: none;">
                            <label for="validationCustom01" class="mb-1">Cat id :</label>
                            <input name="cat_id" value="add" class="form-control" id="cat_id" type="text" />
                          </div>
                          <div class="form-group" style="display: none;">
                            <label for="validationCustom01" class="mb-1">Action :</label>
                            <input name="action" value="add" class="form-control" id="action" type="text" />
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <p id="response"></p>
                      <button id="cat_action" onclick="addCategory();" class="btn btn-primary" type="button">
                        Save
                      </button>
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Close
                      </button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- <script>
              $('#exampleModal').modal('toggle');
            </script> -->
            <div class="table-responsive">

              <div id="" class="product-physical jsgrid" style="position: relative; height: auto; width: 100%;">
                <div class="jsgrid-grid-header">
                  <table class="jsgrid-table">
                    <tr class="jsgrid-header-row">
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50px;">Image</th>
                      <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Name</th>
                      <th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable" style="width: 50px;">Total Products</th>
                      <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Parent Category</th>
                      <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Status</th>
                      <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;"><input class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button" type="button" title="Switch to inserting"></th>
                    </tr>

                  </table>
                </div>
                <div class="jsgrid-grid-body">
                  <table class="jsgrid-table">
                    <tbody>
                      <?php
                      foreach ($category as $catData) {

                      ?>

                        <tr class="jsgrid-alt-row" id="<?php echo $catData['id']; ?>">
                          <td class="jsgrid-cell jsgrid-align-center" style="width: 50px;"><img src="<?php echo "../assets/images/categories/" . $catData['cat_image']; ?>" class="blur-up lazyloaded" style="height: 50px; width: 50px;"></td>
                          <td class="jsgrid-cell" style="width: 100px;"><?php echo $catData['cat_title']; ?></td>
                          <td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">$462.00</td>

                          <td class="jsgrid-cell" style="width: 50px;"><?php if ($catData['parent_id'] == 0) {
                                                                          echo "None";
                                                                        } else {
                                                                          echo "Subcategory";
                                                                        } ?></td>
                          <td class="jsgrid-cell" style="width: 50px;"><?php if ($catData['status'] == 0) {
                                                                          echo "<i class='fa fa-circle font-alert f-12'>";
                                                                        } else {
                                                                          echo "<i class='fa fa-circle font-success f-12'>";
                                                                        } ?></i></td>
                          <td class="jsgrid-cell" style="width: 50px;"><a data-toggle="modal" data-original-title="test" data-target="#exampleModal" href="javascript:void(0)" onclick="editCat('<?php echo $catData['id']; ?>');" class='fa fa-edit font-success f-12' style="font-size: 20px;"></a>&#160;&#160;<a onclick="deleteCat('<?php echo $catData['id']; ?>');" href="javascript:void(0)" class='fa fa-trash-o f-12' style="font-size: 20px;color:red;"></a></td>

                        </tr>

                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="jsgrid-pager-container" style="">
                  <div class="jsgrid-pager">Pages: <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">First</a></span> <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">Prev</a></span> <span class="jsgrid-pager-page jsgrid-pager-current-page">1</span><span class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span> &nbsp;&nbsp; 1 of 2 </div>
                </div>
                <div class="jsgrid-load-shader" style="display: none; position: absolute; inset: 0px; z-index: 1000;"></div>
                <div class="jsgrid-load-panel" style="display: none; position: absolute; top: 50%; left: 50%; z-index: 1000;">Please, wait...</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
</div>

<!-- footer start-->
<?php include("inc/footer.php") ?>