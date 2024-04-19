<?php
class Controller{
    /**
     *  /
     *  トップページ(index.php)への遷移
     */ 
    function top($args){
        require_once('./models/tag.php');
        require_once('./models/article_tag.php');
        require_once('./models/article.php');
        
        $tags = Tag::all();
        $article_tags = Article_tag::find_by_tag($args["tag_id"]);
        $articles = [];
        foreach($article_tags as $article_tag) {
            $article = Article::find($article_tag["article_id"]);
            $article_tags_2 = Article_tag::find_by_article($article["id"]);
            $article_with_tags = [];
            foreach($article_tags_2 as $article_tag_2) {
                array_push($article_with_tags, Tag::find($article_tag_2["tag_id"]));
            }
            array_push($articles, [ "tags" => $article_with_tags, "article" => $article ]);
        }
        
        include_once('./views/top/index.php');
    }
    

    /**
    * /admin/ 
    * 管理者画面への遷移
    */
    function admin($args){
        require_once('./models/expert_user.php');
        $experts = ExpertUser::all();
        include_once('./views/admin/admin_view.php');
    }
    
    /**
     * /admin/expert/<expert_id>
     * 管理者によるエキスパート管理画面
     */
    function admin_expert($args){
        require_once('./models/expert_user.php');
        $expert_id = $args['expert_id'];
        $expert = ExpertUser::find($expert_id);
        include_once('./views/admin/admin_expert.php');
    }
    
    /**
     * /admin/expert/create/ 
     * エキスパート作成(create)の実行
     * 実行後に管理者ページ(/admin/)への遷移
     */
    function admin_create_expert($args){
        require_once('./models/expert_user.php');
        $pass = $_POST['pass'];
        $first_name = $_POST['first_name'];
        $family_name = $_POST['family_name'];
        $description = $_POST['description'];
        $major = $_POST['major'];
        $expert = ExpertUser::save($pass=$pass, $first_name=$first_name, $family_name=$family_name, $description=$description, $major=$major);
        header('Location: /admin/expert/');
    }
    
    /**
     * /admin/expert/<expert_id>/update
     * エキスパートの更新
     */
    function admin_update_expert($args){
        require_once('./models/expert_user.php');
        $id = $args['expert_id'];
        $pass = $_POST['pass'];
        $first_name = $_POST['first_name'];
        $family_name = $_POST['family_name'];
        $description = $_POST['description'];
        $major = $_POST['major'];
        $expert = ExpertUser::update($id=$id, $pass=$pass, $first_name=$first_name, $family_name=$family_name, $description=$description, $major=$major);
        header('Location: /admin/expert/'.$expert['id'].'/');
    }
    
    /**
     * /expert/<id> 
     * エキスパートの個人ページ
     */
    function expert($args){
        require_once('./models/expert_user.php');
        require_once('./models/article.php');
        require_once('./models/question.php');
        $expert = ExpertUser::find($id=$args['expert_id']);
        $articles = Article::find_by_author($author_id=$expert['id']);
        $questions = Question::all();
        include_once('./views/expert/expert_view.php');
    }
    
    /** 
     * /expert/<id>/article/new/ 
     * エキスパートによる記事の執筆ページへの遷移
     */
    function expert_edit_new_article($args){
        require_once('./models/expert_user.php');
        require_once('./models/tag.php');
        require_once('./models/affiliate_product.php');
        
        $expert = ExpertUser::find($id=$args['expert_id']);
        $tags = Tag::all();
        $affiliate_products = Affiliateproduct::all();
        include('./views/expert/article_edit.php');
    }
    
    /** 
     * /expert/<expert_id>/article/create/
     *  記事の新規作成(create)の実行
     * 実行後に記事ページへ遷移
     */
    function expert_create_article($args){
        require_once('./models/article.php');
        require_once('./models/tag.php');
        require_once('./models/article_tag.php');
        require_once('./models/affiliate_product.php');
        require_once('./models/article_affiliate_product.php');
        
        // 記事の保存
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author_id = $args['expert_id'];
        $image_path = '/resources/images/articles' . $_FILES['upimg']['tmp_name'] . $_FILES['upimg']['name'];
        $article = Article::save($title=$title, $content=$content, $author_id=$author_id, $image_path=$image_path);
        move_uploaded_file($_FILES['upimg']['tmp_name'], "." . $image_path);

        // タグの登録
        $tags = Tag::all();
        $checked_tags = array();
        foreach ($tags as $tag){
            $key = "tag_".$tag['id'];
            if($_POST[$key] == null){
                continue;
            }else{
                $checked_tags[$tag['id']] = $tag;
            }
        }

        foreach($checked_tags as $tag){
            Article_tag::save($article_id=$article['id'], $tag_id=$tag['id']);
        }
        unset($checked_tags);
        
        // アフィリエイトの登録
        $affiliate_products = $_POST['affliate_products'];
        foreach($affiliate_products as $affiliate_product){
            Article_affiliate_product::save($article_id=$article['id'], $affliate_product_id=$affliate_product['id']);
        }
        unset($affiliate_products);
        
        header('Location: /article/'.$article['id'].'/');
    }
    
    /**
     *  /expert/<expert_id>/article/<article_id>/ 
     * エキスパートによる記事の編集画面への遷移
     */
    function expert_edit_exist_article($args){
        require_once('./models/expert_user.php');
        require_once('./models/article.php');
        require_once('./models/article_tag.php');
        
        $expert = ExpertUser::find($args['id']);
        $article = Article::find($args['article_id']);
        $current_tags = Article_tag::find_by_article($article['id']);
        $current_affliate_products = Article_affliate_product::find_by_article($article['id']);
        $tags = Tag::all();
        $affiliate_products = Affiliateproduct::all();
        include('./views/expert/article_edit.php');
    }
    
    /**
     *  /expert/<expert_id>/article/<article_id>/update/ 
     * エキスパートによる記事の更新(update)の実行
     * 実行後に記事ページへ遷移
     */
    function expert_update_article($args){
        require_once('./models/article.php');
        require_once('./models/tag.php');
        require_once('./models/article_tag.php');
        require_once('./models/affiliate_product.php');
        require_once('./models/article_affiliate_product.php');
        
        // 記事の上書き
        $article_id = $args['article_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author_id = $args['expert_id'];
        $image_path = $_POST['image_path'];
        $article = Article::update($id=$article_id, $title=$title, $content=$content, $author_id=$author_id, $image_path=$image_path);
        
        // タグの登録
        $tags = Tag::all();
        $checked_tags = array();
        foreach ($tags as $tag){
            $key = "tag_".$tag['id'];
            if($_POST[$key] == null){
                continue;
            }else{
                $checked_tags[$tag['id']] = $tag;
            }
        }

        foreach($checked_tags as $tag){
            Article_tag::save($article_id=$article['id'], $tag_id=$tag['id']);
        }
        unset($checked_tags);
        
        // アフィリエイトの登録
        $affiliate_products = $_POST['affliate_products'];
        foreach($affiliate_products as $affiliate_product){
            Article_affiliate_product::save($article_id=$article['id'], $affliate_product_id=$affliate_product['id']);
        }
        unset($affiliate_products);
        
        header('Location: /article/'.$article['id'].'/');
    }
    
    /**
     *  /expert/<expert_id>/question/<question_id>/answer/new/
     * エキスパートによる質問に対する回答の新規作成ページへの遷移
     */
    function expert_edit_new_answer($args){
        require_once('./models/question.php');
        require_once('./models/expert_user.php');
        
        $author_id = $args['expert_id'];
        $question_id = $args['question_id'];
        
        $question = Question::find($question_id);
        $expert = ExpertUser::find($author_id);
        
        include('./views/expert/answer_edit.php');
    }
    
    /**
     *  /expert/<expert_id>/question/<question_id>/answer/create/
     * エキスパートによる回答の新規作成(create)の実行
     * 実行後に質問ページに遷移
     */
    function expert_create_answer($args){
        require_once('./models/question.php');
        require_once('./models/expert_user.php');
        require_once('./models/answer.php');
        require_once('./models/question_answer.php');
        
        $author_id = $args['expert_id'];
        $question_id = $args['question_id'];
        
        $question = Question::find($id = $question_id);
        $title = $question['title'];
        $content = $_POST['content'];
        
        $answer = Answer::save($title=$title, $content=$content, $author_id=$author_id);
    
        Question_answer::save($question_id=$question_id, $answer_id=$answer['id']);
        header('Location: /question/'.$question_id.'/');
    }
    
    
    
    /**
     *  /article/<id>/ 
     * 記事詳細画面への遷移
     */
    function article($args){
        require_once('./models/article.php');
        require_once('./models/article_affiliate_product.php');
        require_once('./models/affiliate_product.php');
        require_once('./models/article_tag.php');
        require_once('./models/expert_user.php');
        require_once('./models/tag.php');
        
        $article = Article::find($args['article_id']);
        $article_affiliate_products = Article_affiliate_product::find_by_article($article_id=$article['id']);
        $article_tags = Article_tag::find_by_article($article_id=$article['id']);
        $tags = [];
        $affiliates = [];
        foreach ($article_affiliate_products as $article_affiliate_product) {
            $affiliate = AffiliateProduct::find($article_affiliate_product['affiliate_product_id']);
            array_push($affiliates, $affiliate);
        }
        foreach ($article_tags as $article_tag) {
            $tag = Tag::find($article_tag['tag_id']);
            array_push($tags, $tag);
        }
        
        $author = ExpertUser::find($id=$article['author_id']);
        
        include_once('./views/article/show.php');
    }
    
    /**
     * /question/
     */
    function question_top($args){
        require_once('./models/question.php');
        require_once('./models/tag.php');
        
        $questions = Question::all();
        $tags = [];
        foreach ($questions as $question) {
            array_push($tags, Tag::find($question["tag_id"]));
        }
        
        include_once('./views/question/index.php');
    }
    
    /**
     *  /question/<id>/
     *  質問詳細画面への遷移
     */
    function question($args){
        require_once('./models/question.php');
        require_once('./models/question_answer.php');
        require_once('./models/answer.php');
        require_once('./models/expert_user.php');
        require_once('./models/tag.php');
        
        $question = Question::find($args['question_id']);
        $tag = Tag::find($question["tag_id"]);
        $answer_questions = Question_answer::find_by_question($question['id']);
        $answers = [];
        $experts = [];
        foreach ($answer_questions as $answer_question) {
            $answer = Answer::find($answer_question['answer_id']);
            array_push($answers, $answer);
            array_push($experts, ExpertUser::find($answer["author_id"]));
        }

        include_once('./views/question/question_view.php');
    }
    
    /**
     * /question/new/
     * 質問の投稿画面への遷移
     */
    function edit_new_question($args){
        require_once('./models/tag.php');
        $tags = Tag::all();
        include_once('./views/question/question_edit.php');
    }
    
    /**
     * /question/create/
     * 質問の新規作成(create)の実行
     * 実行後に作成した質問詳細ページへの遷移
     * 
     */
    function create_question($args){
        require_once('./models/question.php');
        $title = "title";
        $content = $_POST['content'];
        $tag_id = $_POST['tag_id'];
        $question = Question::save($title=$title, $content=$content, $tag_id=$tag_id);
        header('Location: /question/'.$question['id']);
    }
}
