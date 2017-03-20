<?php
 class PostController extends Controller
 {
     public function currentAction($id)
     {
         $number = intval($id);
         if ($number) {
             $post = new Post();
             $concretePost = $post->getConcretePost($id);
             $comment = new Comment();
             $dataComments = $comment->getCommentsByPost($id);
             $this->view->template = 'post/index';
             $this->view->render('post/index',['post'=>$concretePost,'comments'=>$dataComments]);
         } else {
             $this->view->template = null;
             $this->view->render('error/error404');
         }

     }

     public function createAction()
     {
         if ($_POST) {
             $name = self::validate($_POST['userName']);
             $msg = self::validate($_POST['msg']);
             Post::createPost($name,$msg);
             header ("location: /");
         }
     }
     
     public function commentAction($id)
     {
         if ($_POST) {
             $number = intval($id);
             if ($number) {
                 $name = self::validate($_POST['userName']);
                 $msg = self::validate($_POST['msg']);
                 Comment::createComment($number,$name,$msg);
                 header ("location: /post/current/$id ");
             } else {
                 $this->view->template = null;
                 $this->view->render('error/error404');
             }
         }
     }
     
     public static function validate($str)
     {
         $str = trim($str);
         $str = strip_tags($str);
         $str = htmlspecialchars($str);
         
         return $str;
     }
 }