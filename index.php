<?php
  require_once('blog.php');
   //取得したデータを表示
  $blog = new Blog();
  $blogData = $blog->getAll();
  

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
  <p><a href="/form.html">新規作成</a></p>
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
      <td><?php echo $blog->setCategoryName($column['category'])?></td>
      <td><a href="/detail.php?id=<?php echo $column['id']?>">詳細</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  
</body>
</html>