<?php
class Post
{
    public function getPosts()
    {
        $dbConnect = Db::getInstance();
        $dbConnect->query('
            SELECT p.id,p.author_name,p.text,p.`data`, count(c.id) AS quantity 
            FROM posts AS p
            LEFT JOIN comments AS c ON c.post_id = p.id
            GROUP BY p.id
            ORDER BY p.`data` DESC
        ');
        $posts = $dbConnect->fetchAll();
        return $posts;
    }

    public function getMostPopularPosts()
    {
        $dbConnect = Db::getInstance();
        $dbConnect->query('
            SELECT p.id,p.author_name,p.text,p.`data`, count(c.id) AS quantity 
            FROM posts AS p
            LEFT JOIN comments AS c ON c.post_id = p.id
            GROUP BY p.id
            ORDER BY quantity DESC
            LIMIT 5;
           ');
        $popularPosts = $dbConnect->fetchAll();
        return $popularPosts;
    }

    
    public function getConcretePost($id)
    {
        $dbConnect = Db::getInstance();
        $dbConnect->query('SELECT * FROM posts WHERE id = '.$id);
        $post = $dbConnect->fetchAll();
        return $post; 
    }

    public static function createPost($name,$msg)
    {
        $dbConnect = Db::getInstance();
        $dbConnect->query('INSERT INTO posts (author_name,text) VALUES ("'.$name.'","'.$msg.'")');

    }
}