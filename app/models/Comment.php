<?php
class Comment
{
    public function getComments()
    {
        $dbConnect = Db::getInstance();
        $dbConnect->query('SELECT * FROM comments');
        $comments = $dbConnect->fetchAll();
        return $comments;
    }

    public function getCommentsByPost($id)
    {
        $dbConnect = Db::getInstance();
        $dbConnect->query('SELECT * FROM comments WHERE post_id = '.$id );
        $comments = $dbConnect->fetchAll();
        return $comments;
    }

    public static function createComment($id,$name,$msg)
    {
        $dbConnect = Db::getInstance();
        $dbConnect->query('INSERT INTO comments (post_id,author_name,comment) VALUES ('.$id.',"'.$name.'","'.$msg.'")');

    }
}