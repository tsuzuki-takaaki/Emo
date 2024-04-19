<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>EXPERT</title>
    </head>
    <body>
        <h1>エキスパート詳細</h1>
        <div>
            name : <?php print $expert['first_name'].' '.$expert['family_name']; ?> <br>
            description : <?php print $expert['description']; ?> <br>
        </div>
        
        <h1> 記事の新規作成 </h1> 
            <a href='/expert/<?php print $expert['id']; ?>/article/new/'>新規記事</a>
        
        <h1> 書いた記事一覧 </h1>
            <ul>
                <?php foreach($articles as $article){ ?>
                    <li>
                        <a href='/expert/<?php print $expert['id']; ?>/article/<?php print $article['id']; ?>'>
                             <?php print $article['title']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        
        <h1> 質問一覧 </h1>
            <ul>
                <?php foreach($questions as $question){ ?>
                    <li>
                        <a href='/expert/<?php print $expert['id']; ?>/question/<?php print $question['id']; ?>/answer/new/'>
                             <?php print $question['title']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
    </body>
</html>
