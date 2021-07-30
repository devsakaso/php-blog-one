<?php

require "includes/dbh.php";
$sql_categories = "SELECT * FROM blog_category";
$query_categories = mysqli_query($conn, $sql_categories);
$num_categories = mysqli_num_rows($query_categories);
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
                  </div>

                    <?php

                      // add category
                      if (isset($_REQUEST['addcategory'])) {
                        if ($_REQUEST['addcategory'] == "success") {
                          echo "<div class='alert alert-success'>
                                <strong>Success!</strong> カテゴリーを追加しました。
                              </div>";
                            } else if ($_REQUEST['addcategory'] == "error") {
                              echo "<div class='alert alert-danger'>
                                    <strong>Error!</strong> カテゴリーを追加できませんでした。
                                  </div>";
                        }

                      // edit category
                      } else if (isset($_REQUEST['editcategory'])) {
                        if ($_REQUEST['editcategory'] == "success") {
                          echo "<div class='alert alert-success'>
                                <strong>Success!</strong> カテゴリーを変更しました。
                              </div>";
                            } else if ($_REQUEST['editcategory'] == "error") {
                              echo "<div class='alert alert-danger'>
                                    <strong>Error!</strong> カテゴリーを変更できませんでした。
                                  </div>";
                        }
                      // }

                      // delete category
                    } else if (isset($_REQUEST['deletecategory'])) {
                      if ($_REQUEST['deletecategory'] == "success") {
                        echo "<div class='alert alert-success'>
                              <strong>Success!</strong> カテゴリーを削除しました。
                            </div>";
                          } else if ($_REQUEST['deletecategory'] == "error") {
                            echo "<div class='alert alert-danger'>
                                  <strong>Error!</strong> カテゴリーを削除できませんでした。
                                </div>";
                      }
                    }
                    ?>

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
                                            <!-- db接続後、ループしてカテゴリーがdbにあるだけ表示させる -->
                                            <?php
                                              
                                              $counter = 0;

                                              while($row_categories = mysqli_fetch_assoc($query_categories)) {

                                                $counter++;

                                                $id = $row_categories['n_category_id'];
                                                $name = $row_categories['v_category_title'];
                                                $meta_title = $row_categories['v_category_meta_title'];
                                                $category_path = $row_categories['v_category_path'];
                                            ?>

                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $meta_title; ?></td>
                                                <td><?php echo $category_path; ?></td>
                                                <td>
                                                  <!-- clickでcategory_pathにとぶ -->
                                                  <button class="popup-button" onclick="window.open('../categories.php?group=<?php echo $category_path; ?>', '_blank')">確認</button>
                                                  <!-- idはそれぞれのbuttonに$idでidが付与されている -->
                                                  <button data-toggle="modal" data-target="#edit<?php echo $id; ?>" class="popup-button">編集</button>
                                                  <button data-toggle="modal" data-target="#delete<?php echo $id; ?>" class="popup-button">削除</button>
                                                </td>
                                                <!-- modal edit -->
                                                <div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <form method="POST" action="includes/edit-category.php">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                  <h4 class="modal-title" id="myModalLabel">カテゴリー編集画面</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <input type="hidden" name="category-id" value="<?php echo $id; ?>">
                                                                  <div class="form-group">
                                                                      <label>カテゴリー名</label>
                                                                      <input class="form-control" name="edit-category-name" value="<?php echo $name; ?>">
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <label>Metaタイトル</label>
                                                                      <input class="form-control" name="edit-category-meta-title" value="<?php echo $meta_title; ?>">
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <label>カテゴリーパス</label>
                                                                      <input class="form-control" name="edit-category-path" value="<?php echo $category_path; ?>">
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                                                  <button type="submit" class="btn btn-primary" name="edit-category-btn">保存する</button>
                                                              </div>
                                                          </form>
                                                      </div>
                                                  </div>
                                                </div>
                                                <!-- modal delete -->
                                                <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <form method="POST" action="includes/delete-category.php">
                                                          <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                              <h4 class="modal-title" id="myModalLabel">カテゴリー削除画面
                                                              </h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            <!-- type hiddenでpopupでも見えないフィールド -->
                                                              <input type="hidden" name="category-id" value="<?php echo $id; ?>">
                                                              <p>カテゴリー名:"<?php echo $name; ?>"を削除してよいですか？</p>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                                              <button type="submit" class="btn btn-primary" name="delete-category-btn">削除する</button>
                                                          </div>
                                                        </form>
                                                      </div>
                                                  </div>
                                                 </div>
                                            </tr>

                                            <!-- whileのエンド -->
                                            <?php
                                              }
                                            ?>
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
