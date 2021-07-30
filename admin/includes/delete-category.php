<?php

require "dbh.php";

if (isset($_POST['delete-category-btn'])) {

  $id = $_POST['category-id'];

  $sql_delete_category = "DELETE FROM blog_category WHERE n_category_id = '$id'";

  if (mysqli_query($conn, $sql_delete_category)) {
    mysqli_close($conn);
    header("Location: ../blog-category.php?deletecategory=success");
    exit();
    
  } else {

    mysqli_close($conn);
    header("Location: ../blog-category.php?deletecategory=error");
    exit();
    
  }

} else {
  header("Location: ../index.php");
  exit();
}