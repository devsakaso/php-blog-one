<?php

require "includes/dbh.php";
$sqlCategories = "SELECT * FROM blog_category";
$queryCategories = mysqli_query($conn, $sqlCategories);
$numCategories = mysqli_num_rows($queryCategories);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        
    <!-- header side -->
    <?php 
      include "header.php";
      include "sidebar.php";
    ?>
        <div id="page-wrapper" >
            <div id="page-inner">
          			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            ブログカテゴリー
                        </h1>
                    </div>

                    <div class="row">
                      <div class="col-lg-12">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  カテゴリーを追加
                              </div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-lg-12">
                                        <!-- formをadd-category.phpとつなげる -->
                                          <form role="form" method="POST" action="includes/add-category.php">
                                              <div class="form-group">
                                                  <label>カテゴリー名</label>
                                                  <input class="form-control" name="category-name">
                                              </div>
                                              <div class="form-group">
                                                  <label>metaタイトル</label>
                                                  <input class="form-control" name="category-meta-title">
                                              </div>
                                              <div class="form-group">
                                                  <label>カテゴリーパス(lower case, スペースなし)</label>
                                                  <input class="form-control" name="category-path">
                                              </div>
                                              <button type="submit" class="btn btn-default" name="add-category-btn">カテゴリーを追加</button>

                                          </form>
                                      </div>

                                  </div>
                                  <!-- /.row (nested) -->
                              </div>
                              <!-- /.panel-body -->
                          </div>
                          <!-- /.panel -->

                          <!--   テーブル -->
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  すべてのカテゴリー
                              </div>
                              <div class="panel-body">
                                  <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr>
                                                  <th>ID</th>
                                                  <th>カテゴリー名</th>
                                                  <th>metaタイトル</th>
                                                  <th>カテゴリーパス
                                                  <th>アクション
                                                  </th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td>
                                                    <button>確認</button>
                                                    <button>編集</button>
                                                    <button>削除</button>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <!-- End  カテゴリーテーブル -->
                    </div>
                      <!-- /.col-lg-12 -->
                  </div>
             </div> 
                 <!-- /. ROW  -->
				 <!-- footer -->
         <?php include "footer.php"; ?>
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
