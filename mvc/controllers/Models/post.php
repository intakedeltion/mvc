<?php
class post {
    public $id;
    public $author;
    public $content;
    public $title;
    public $slug;
    public $datum;


    public function __construct($id, $author, $content, $title, $slug, $datum) {
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
        $this->title = $title;
        $this->slug = $slug;
        $this->datum= $datum;
    }
    //this function gets all data from the database
    public static function all() { 
        $list = []; 
        $db = Db::getInstance(); 
        $req = $db->query('SELECT * FROM posts'); 

        foreach($req->fetchAll() as $post) { 
            $list[] = new Post($post['id'], $post['author'], $post['content'], $post['title'], $post['slug'], $post['datum']);
        } 

        return $list;
    }

    //this function looks for data with input id
    public static function find($id) {
        $db = Db::getInstance(); 
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id= :id');
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        return new Post($post['id'], $post['author'], $post['content'], $post['title'], $post['slug'], $post['datum']);
    }
    //this function delets the colum with input id
    public static function delete($id){
        $db = Db::getInstance(); 
        $id = intval($id);
        $req = $db->prepare('DELETE FROM posts WHERE id= :id');
        $req->bindParam(':id', $id);
        $req->execute();

    }
    //this function create colum with input data
    public static function create($author, $content, $datum, $slug, $title) {
        $db = Db::getInstance(); 
        $req = $db->prepare('INSERT INTO posts (author, content, id, datum, slug, title) VALUES (:author, :content, NULL, :datum, :slug, :title)');
        $req->bindParam(':author', $author);
        $req->bindParam(':content', $content);
        $req->bindParam(':datum', $datum);
        $req->bindParam(':slug', $slug);
        $req->bindParam(':title', $title);
        $req->execute();
    }
    //this function edits the data colum with the id wat you put in edits data with data that you put in
    public static function edit($author, $content, $datum, $slug, $title,$id) {
        $db = Db::getInstance(); 
        $req = $db->prepare('UPDATE `posts` SET author = :author, content= :content , datum=:datum, slug= :slug,`title`= :title WHERE id = :id');
        $req->bindParam(':author', $author);
        $req->bindParam(':content', $content);
        $req->bindParam(':datum', $datum);
        $req->bindParam(':slug', $slug);
        $req->bindParam(':title', $title);
        $req->bindParam(':id', $id);
        $req->execute();
    }
}

?>
