<?php

require "dbh.php";

// edit-category-btnがクリックされたときの処理
if (isset($_POST['edit-category-btn'])) {

  $id = $_POST['category-id'];
  $name = $_POST['edit-category-name'];
  $meta_title = $_POST['edit-category-meta-title'];
  $category_path = $_POST['edit-category-path'];

  // WHERE n_category_id = '$id'でidの位置を確認し、blog_categoryに以下をセットする
  $sql_edit_category = "UPDATE blog_category SET v_category_title = '$name', v_category_meta_title = '$meta_title', v_category_path = '$category_path' WHERE n_category_id = '$id'";

  if (mysqli_query($conn, $sql_edit_category)) {
    mysqli_close($conn);
    header("Location: ../blog-category.php?editcategory=success");
    exit();
  }
  else {
      mysqli_close($conn);
      header("Location: ../blog-category.php?editcategory=error");
      exit();
  }

// edit-category-btnがクリックされていないときの処理
}
else {
    header("Location: ../index.php");
    exit();
}