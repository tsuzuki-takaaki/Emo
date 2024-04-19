<?php
    error_reporting(E_ALL & ~E_NOTICE); //noticeレベルのエラーを非表示
    $params = explode('/', $_GET['url']);
    
    // actionの初期値をtopに固定
    // $action = "top";
    $args = array();
    
    switch ($params[0]) {
        case "": // /
        case "index": // /index/
            $action = 'top';
            if (array_key_exists("tag_id", $_GET)) $args["tag_id"] = $_GET["tag_id"];
            else $args["tag_id"] = 1;
            break;
        case "admin": // /admin/
            $action = "admin";
            if (count($params) < 1) break;
            switch ($params[1]) {
                case "expert": // /admin/expert/
                    if (count($params) < 2) break;
                    $action = "admin_expert";
                    switch($params[2]){ // /admin/expert/create/
                        case "create":
                            $action = "admin_create_expert";
                            break;
                        default: // /admin/expert/<expert_id>/
                            $args['expert_id'] = $params[2];
                            $action = "admin_expert";
                            if (count($params) < 3) break;
                            switch($params[3]){
                                case "update":
                                    $action = "admin_update_expert";
                                    break;
                            }
                            break;
                    }
                    break;
                }
                break;
        case "expert": // /expert/<expert_id>
            if (count($params) < 1) break;
            $args["expert_id"] = $params[1];
            $action = 'expert';
            if (count($params) < 2) break;
            switch ($params[2]) {
                case "article": // /expert/<expert_id>/article/
                    if (count($params) < 3) break;
                    switch($params[3]){
                        case "new": // /expert/<expert_id>/article/new/
                            $action = 'expert_edit_new_article';
                            break;
                        case "create": // /expert/<expert_id>/article/create/
                            $action = 'expert_create_article';
                            break;
                        default: // /expert/<expert_id>/article/<article_id>/
                            $args["article_id"] = $params[3];
                            if (count($params) < 4) break;
                            switch ($params[4]){
                                case "edit": // /expert/<expert_id>/article/<article_id>/edit/
                                    $action = 'expert_edit_exist_article';
                                    break;
                                case "update": // /expert/<expert_id>/article/<article_id>/update/
                                    $action = 'expert_update_article';
                                    break;
                            }
                            break;
                    }
                    break;
                case "question": // /expert/<expert_id>/question/<question_id>/
                    if (count($params) < 3) break;
                    $args["question_id"] = $params[3];
                    if (count($params) < 4) break;
                    switch($params[4]){
                        case "answer": // /expert/<expert_id>/question/<question_id>/answer/
                            if (count($params) < 5) break;
                            switch ($params[5]){
                                case "new": // /expert/<expert_id>/question/<question_id>/new/
                                    $action = "expert_edit_new_answer";
                                    break;
                                case "create": // /expert/<expert_id>/question/<question_id>/create/
                                    $action = "expert_create_answer";
                                    break;
                            }
                            break;
                    }
                    break;
            }
            break;
        
        case "article": // /article/
            if (count($params) < 2) break;
            switch ($params[1]){
                default: // /article/<article_id>/
                    $args["article_id"] = $params[1] ;
                    $action = "article";
                    break;
            }
            break;
        case "question": // /question/
            $action = "question_top";
            if (count($params) < 2) break;
            switch ($params[1]){
                case "new":
                    $action = "edit_new_question";
                    break;
                case "create":
                    $action = "create_question";
                    break;
                case '':
                    $action = "question_top";
                default: // /question/<question_id>/
                    if (strlen($params[1]) == 0){
                        $action = "question_top";
                    }else{
                        $args["question_id"] = $params[1];
                        $action = "question";   
                    }
                    break;
            }
            break;
        default:
            throw new Exception("Routing Error");
    }
    // var_dump($action);
    // var_dump($args);
    require_once('./controllers/controller.php');
    $controller = new Controller;
    $controller->$action($args);
