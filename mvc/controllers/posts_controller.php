<?php
require_once 'Models/post.php';
require_once 'Models/user.php';
class PostsController {
    //goes to the post page and picks all posts
    public function index(){
        if(isset($_SESSION['user_id'])){
            $usergegevens = user::find($_SESSION['user_id']);
        }
        $posts = Post::all();
        require_once('views/posts/index.php');
    }   
    //this page show the 1 post with the id that you wanna see
    public function show(){
        if(!isset($_GET['id']))
            return call('pages', 'error');

        $post = Post::find($_GET['id']);
        require_once('views/posts/show.php');

    }
    //this function delete the 1 that you wanna delete
    public function delete(){
        if(!isset($_GET['id']))
            return call('pages', 'error');

        Post::delete($_GET['id']);
        require_once('views/posts/delete.php');

    }
    //this function goed to ceatepage
    public function createpage(){

        require_once('views/posts/createpage.php');

    }
    //this function edit post white the id that you want
    public function editpage(){
        if(!isset($_GET['id']))
            return call('pages', 'error');

        $post = Post::find($_GET['id']);

        require_once('views/posts/editpage.php');

    }

    //this function creat post white the
    public function create(){
        if(isset($_SESSION['user_id'])){
            if(isset($_POST['content']) && isset($_POST['datum']) && isset($_POST['title']) && isset($_POST['slug'])){
                $usergegevens = user::find($_SESSION['user_id']);
                $post = Post::create($usergegevens->authorsName,$_POST['content'],$_POST['datum'],$_POST['slug'],$_POST['title']);
                require_once('views/posts/create.php');
            } else{
                require_once('views/pages/error.php'); 
            }
        } else{
            require_once('views/pages/error.php'); 
        }

    }

    //this function goes to the editpage looks if al is ready
    public function edit(){
        if(isset($_SESSION['user_id'])){
            if(isset($_POST['content']) && isset($_POST['datum']) && isset($_POST['title']) && isset($_POST['slug']) && isset($_POST['slug']) && isset($_GET['id'])){
                $usergegevens = user::find($_SESSION['user_id']);
                $post = Post::edit($usergegevens->authorsName,$_POST['content'],$_POST['datum'],$_POST['slug'],$_POST['title'],$_GET['id']);
                require_once('views/posts/edit.php');
            } else{
                require_once('views/pages/error.php'); 
            }
        } else{
            require_once('views/pages/error.php'); 
        }

    }

}
?>