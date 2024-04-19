<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ADMIN EXP TOP</title>
    </head>
    <body>
        <h1>エキスパート情報</h1>
            <p>id: <?php print $expert['id']; ?></p>
            <p>pass: <?php print $expert['pass']; ?></p>
            <p>First Name: <?php print $expert['first_name']; ?></p>
            <p>Family Name: <?php print $expert['family_name']; ?></p>
            <p>Description: <?php print $expert['description']; ?></p>
            <p>Major: <?php print $expert['major']; ?></p>
            
        <h1>エキスパート更新</h1>
            <form action="/admin/expert/<?php print $expert_id; ?>/update/" method="post">
                <p>pass: <input type="text" name="pass" value="<?php print $expert['pass']; ?>" required></p>
                <p>First Name: <input type="text" name="first_name" value="<?php print $expert['first_name']; ?>" required></p>
                <p>Family Name: <input type="text" name="family_name" value="<?php print $expert['family_name']; ?>" required></p>
                <p>Description: <input type="text" name="description" value="<?php print $expert['description']; ?>" required></p>
                <p>Major: <input type="text" name="major" value="<?php print $expert['major']; ?>" required></p>
                <p><input type="submit" value="submit"></p>
            </form>
    </body>
</html>
