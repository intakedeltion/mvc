<?php
class user {
    public $userid;
    public $authorsName;
    public $name;
    public $email;
    public $wachtwoord;
    public $rol;


    public function __construct($userid, $authorsName, $name, $email, $wachtwoord, $rol) {
        $this->userid = $userid;
        $this->authorsName = $authorsName;
        $this->name = $name;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
        $this->rol= $rol;
    }
    //this function looks if you account is in the database
    public static function canlogin($email, $password){
        $db = Db::getInstance(); 
        $req = $db->prepare('SELECT userid , password from users where email = :email');  
        $req->bindParam(':email', $email);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        if (password_verify($password, $result['password'])) {
            return($result['userid']);
        } else {
            return('');
        }
    }
    //this function looks if you input already exist in the datbases
    public static function DoesHeExit($culom, $value, $extra){
        $db = Db::getInstance(); 
        $req = $db->prepare("SELECT COUNT(*) AS aantal FROM users WHERE $culom = :value $extra");  
        $req->bindParam(':value', $value);
        $req->execute();
    
        $result = $req->fetch(PDO::FETCH_ASSOC);
    
        if ($result['aantal'] > 0) {
            return true;
        } else {
            return false;
        }
    }
    //this function looks data with the input id
    public static function find($id) {
        $db = Db::getInstance(); 
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM users WHERE userid = :id');
        $req->execute(array('id' => $id));
        $user = $req->fetch();
        return new user($user['userid'], $user['authorName'], $user['name'], $user['email'], $user['password'], $user['rol']);
    }
    //this function delte the data with id 
    public static function delete($id){
        $db = Db::getInstance(); 
        $id = intval($id);
        $req = $db->prepare('DELETE FROM users WHERE userid = :id');
        $req->bindParam(':id', $id);
        $req->execute();

    }
    //this function create new colum with the input data
    public static function create($authorsname, $name, $email, $wachtwoord) {
        $db = Db::getInstance(); 
        $req = $db->prepare('INSERT INTO users (userid, authorName, name, email, password, rol) VALUES (NULL, :authorsname, :name, :email, :wachtwoord, "gebruiker")');
        $req->bindParam(':authorsname', $authorsname);
        $req->bindParam(':name', $name);
        $req->bindParam(':email', $email);
        $req->bindParam(':wachtwoord', $wachtwoord);
        $req->execute();
    }
    //this function edits the data colum with the id wat you put in edits data with data that you put in
    public static function edit($authorsname, $name, $email, $id) {
        $db = Db::getInstance(); 
        $req = $db->prepare('UPDATE `users` SET authorName = :authorsname, name = :name, email = :email WHERE userid = :id');
        $req->bindParam(':authorsname', $authorsname);
        $req->bindParam(':name', $name);
        $req->bindParam(':email', $email);
        $req->bindParam(':id', $id);
        $req->execute();
    }


}