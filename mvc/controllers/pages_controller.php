<?php 
class PagesController { 
    //goes to home page
    public function home() { 
        $first_name = 'Christian'; 
        $last_name = 'Sieljes'; 
        require_once('views/pages/home.php'); 
    } 
    //goes to the error page
    public function error() { 
        require_once('views/pages/error.php'); 
    }
}
?>