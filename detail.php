<?php

// 1 require_onceを使ってみよう
require_once('dbc.php');

// 2 namespaceを設定しよう


// 3 useを使おう


$result = getBlog($_GET['id']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ブログ詳細</title>
</head>
<body>
  <h2>ブログ詳細</h2>
  <h3>タイトル：<?php echo $result['title']?></h3>
  <p>投稿日時：<?php echo $result['post_at']?></p>
  <p>カテゴリ：<?php echo setCategoryName($result['category'])?></p>
  <hr>
  <p>本文：<?php echo $result['contents']?></p>
  
</body>
</html>