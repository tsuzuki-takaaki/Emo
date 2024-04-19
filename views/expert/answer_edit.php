<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>EXP ANS EDIT</title>
    </head>
    <body>
        <h1>回答投稿</h1>
            <p><b>質問内容</b></p>
            <!--<form action="/admin/expert/create" method="post">-->
            <!--    <p>First Name: <input type="text" name="first_name" required></p>-->
            <!--    <p>Family Name: <input type="text" name="family_name" required></p>-->
            <!--    <p>Description: <input type="text" name="description" required></p>-->
            <!--    <p><input type="submit" value="submit"></p>-->
            <!--</form>-->
                <form action="/expert/<?php print $expert['id']; ?>/question/<?php print $question['id']; ?>/answer/create/" method="post">
                <p><?php print htmlspecialchars($question['content'], ENT_QUOTES, "UTF-8"); ?></p>
                <textarea name="content" rows="4" cols="40" type="text" required>ここに回答を入力</textarea>
                <p><input type="submit" value="質問に回答する"></p>
            </form>
    </body>
</html>