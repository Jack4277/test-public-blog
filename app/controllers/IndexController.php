<?php
class IndexController extends Controller
{
    public function indexAction()
    {
        $post = new Post();
        $dataPost = $post->getPosts();
        $popularPosts = $post->getMostPopularPosts();
        

        $this->view->render('layout',[
            'posts'=>$dataPost,
            'popularPosts'=>$popularPosts,
        ]);
    }


}