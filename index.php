<!DOCTYPE html>
<html lang="en">
<?php

$domOBJ = new DOMDocument();
// $domOBJ->load($_POST['rssurl']);

if (isset($_POST['submit']) && $_POST['rssurl'] !== '') {
  $domOBJ->load($_POST['rssurl']);
}

$content = $domOBJ->getElementsByTagName("item");

// foreach ($content as $data) {
//   $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
//   $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
//   echo " $title :: $link";
// }

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RSS feed reader website</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <form action="" method="post">
    <span>URL :</span>
    <input type="url" name="rssurl" id="rssurl">
    <input type="submit" name="submit" value="Add">
  </form>
  <article>
    <?php foreach ($content as $data) : ?>
      <?php
      $title = $data->getElementsByTagName("title")->item(0)->nodeValue;
      $link = $data->getElementsByTagName("link")->item(0)->nodeValue;
      $description = $data->getElementsByTagName("description")->item(0)->nodeValue;
      ?>
      <div class="rssfeed">
        <h3><?= $title ?></h3>
        <p><?= $description ?></p>
        <h4><a href="<?= $link ?>"><?= $link ?></a> </h4>
      </div>

    <?php endforeach ?>
  </article>
</body>

</html>