<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ADMIN TOP</title>
    </head>
    <body>
        <h1>エキスパート一覧</h1>
            <ul>
                <?php foreach ($experts as $expert){?>
                    <li>
                        <p>
                        <a href='/expert/<?php print $expert['id'] ?>'>
                        <?php print $expert['fist_name'].' '.$expert['family_name']; ?>
                        </a>
                        <br>
                        <a href='/admin/expert/<?php print $expert['id']; ?>/'>
                            (edit)
                        </a>
                        </p>
                    </li>
                <?php } ?>
            </ul>
            
        <h1>エキスパート新規作成</h1>
            <form action="/admin/expert/create" method="post">
                <p>pass: <input type="text" name="pass" required></p>
                <p>First Name: <input type="text" name="first_name" required></p>
                <p>Family Name: <input type="text" name="family_name" required></p>
                <p>Description: <input type="text" name="description" required></p>
                <p>Major: <input type="text" name="major" required></p>
                <p><input type="submit" value="submit"></p>
            </form>
    </body>
</html>
