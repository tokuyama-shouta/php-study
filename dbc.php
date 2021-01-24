<?php

  // 関数一つに一つの機能のみを持たせる
  // 1.データベース接続
  // 2.データベース取得
  // 3.カテゴリー名を表示する

  // 1.データベース接続
  // 引数：なし
  // 返り値：接続結果を返す

  function dbConnect(){

    $dsn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
    $user = 'blog_user';
    $pass = 'ts1031';

    try{
      $dbh = new PDO($dsn,$user,$pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]);
    }catch(PDOException $e) {
      echo '接続失敗'. $e->getMessage();
      exit();
    };
    return $dbh;
  }

  // 2.データを取得する
  // 引数：なし
  // 返り値：取得したデータ

  function getAllBlog(){
    $dbh = dbConnect();
    // 1 SQLの準備
    $sql = 'SELECT * FROM blog';
    // 2 SQLの実行
    $stmt = $dbh->query($sql);
    // 3 SQLの結果を受け取る
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
    $dbh = null;
    
  };
  //取得したデータを表示
  $blogData = getAllBlog();

  // 3.カテゴリー名を表示
  // 引数：数字
  // 返り値：カテゴリーの文字列
  function setCategoryName($category) {
    if($category === '1'){
      return 'ブログ';
    } elseif ($category === '2') {
      return '日常';
    } else {
      return 'その他';
    }
  };

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ一覧</title>
</head>
<body>
  <h2>ブログ一覧</h2>
  <table>
    <tr>
      <th>No</th>
      <th>タイトル</th>
      <th>カテゴリ</th>
    </tr>
    <?php foreach($blogData as $column): ?>
    <tr>
      <td><?php echo $column['id']?></td>
      <td><?php echo $column['title']?></td>
      <td><?php echo setCategoryName($column['category'])?></td>
      <td><a href="/detail.php?id=<?php echo $column['id']?>">詳細</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  
</body>
</html>