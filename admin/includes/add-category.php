<?php

require "dbh.php";

// もしadd-category-btnが押されたら(blog-category.php)
if(isset($_POST['add-category-btn'])) {

  // blog-category.phpのname属性を取得
  $name = $_POST['category-name'];
  $meta_title = $_POST['category-meta-title'];
  $category_path = $_POST['category-path'];

  $date = date("Y-m-d");
  $time = date("H:i:s");

  // 機能してる確認
  // echo $name;
  // echo $meta_title;
  // echo $time;

  $sql_add_category = "INSERT INTO blog_category (v_category_title, v_category_meta_title, v_category_path, d_date_created, d_time_created) VALUES('$name', '$meta_title', '$category_path', '$date', '$time')"; 
  
  if(mysqli_query($conn, $sql_add_category)) {

    mysqli_close($conn); //毎回コネクションをきる
    header("Location: ../blog-category.php?addcategory=success");// 成功がわかりやすいようにaddcategory=successを付け足す
    exit();

  } else {

    mysqli_close($conn); //毎回コネクションをきる
    header("Location: ../blog-category.php?addcategory=error"); //接続失敗
    exit();

  }

  
} else {

    header("Location: ../index.php");
    exit();

}