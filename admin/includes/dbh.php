  <?php
  // <!-- データベースコネクション -->
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'php-blogs';// phpMyAdminで作ったデータベース名

  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_db);


  
  // データベースに接続失敗したとき
  if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }

