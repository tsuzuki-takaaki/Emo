<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ADMIN EXP TOP</title>
    </head>
    <body>
        <h1>記事作成</h1>
                <form action="/expert/<?php print $expert['id']; ?>/article/create/" method="post" enctype="multipart/form-data">
                <p>記事タイトル: <input type="text" name="title" required></p>
                <p>本文を入力せい<textarea name="content" rows="4" cols="40" type="text" required></textarea></p>
                <input type="file" name="upimg" accept="image/*">
                <?php foreach($tags as $tag){ ?>
                <label>
                  <input type="checkbox" name="tag_<?php print $tag['id']; ?>" value="<?php print $tag['id']; ?>">
                   <?php print htmlspecialchars($tag["name"], ENT_QUOTES, "UTF-8"); ?>
                </label>
                <?php } ?>
                <p><input type="submit" value="送る"></p>
            </form>
            
            
    </body>
</html>