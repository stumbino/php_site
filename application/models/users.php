<?php
class Users extends Model{
	
	public $uID;
    public $first_name;
    public $last_name;
    public $email;
    protected $user_type;


	// Constructor
	public function __construct(){
		parent::__construct();

        if(isset($_SESSION['uID'])) {

            $userInfo = $this->getUserFromID($_SESSION['uID']);

            $this->uID = $userInfo['uID'];
            $this->first_name = $userInfo['first_name'];
            $this->last_name = $userInfo['last_name'];
            $this->email = $userInfo['email'];
            $this->user_type = $userInfo['user_type'];

        }

    }

    public function getUserName() {
        return $this->first_name. ' ' . $this->last_name;
    }

    public function getEmail () {
        return $this->email;
    }

    public function isRegistered() {
        if(isset($this->user_type)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function isAdmin() {
           if($this->user_type == '1') {
               return true;
           }
            else {
                return false;
            }
    }
	
	public function getUser($uID){
		$sql = 'SELECT uID, first_name, last_name, email, password FROM users WHERE uID = ?';
		
		// perform query
		$results = $this->db->getrow($sql, array($uID));
		$user = $results;
		return $user;
	}
		
	public function getAllUsers($limit = 0){
		if($limit > 0){
			$numusers = ' LIMIT '.$limit;
		}
		$sql = 'SELECT uID, first_name, last_name, email, password, active FROM users'.$numusers;
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$users[] = $row;
		}

		return $users;
	}
	
	public function addUser($data){
		$sql = 'INSERT INTO users (first_name, last_name, email, password, active) VALUES (?,?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'User added.';
		return $message;
	}

    public function checkUser($email, $password) {

        $sql = "SELECT email, password FROM users WHERE email = ?";

        $results = $this->db->getrow($sql, array($email));


        $user = $results;

        $password_db = $user[1];

        if(password_verify($password,$password_db)) {
            return true;
        }
        else {
            return false;
        }

    }

    public function getUserFromEmail($email) {

        $sql = 'SELECT * FROM users WHERE email = ?';

        $results = $this->db->getrow($sql, array($email));


        $user = $results;

        return $user;

    }

    public function getUserFromID($uID) {

        $sql = 'SELECT * FROM users WHERE uID = ?';
        $results = $this->db->getrow($sql, array($uID));

        $user = $results;

        return $user;

    }

    public function delete($uID) {
        echo "hello world".$uID;
        $sql = "DELETE FROM users WHERE uID = {$uID}";
        $this->db->execute($sql, array());
        $message = "Post updated.";
        
        return $message;
    }
    public function addApprove($uID){
        $sql = "UPDATE users SET active = 1 where uID = {$uID}";
		$this->db->execute($sql,array());
		$message = 'User added.';
		return $message;
    }
    public function updateUser($uID){
        $sql = "UPDATE users SET active = 1 where uID = {$uID}";
		$this->db->execute($sql,array());
		$message = 'User added.';
		return $message;
    }
    //updating members form
    public function updateProfile($data){
        $sql = "UPDATE users SET email = ?, first_name = ?, last_name = ? where uID = ?";
        $this->db->execute($sql, array($data['email'],$data['first_name'],$data['last_name'],$data['uID']));
		$message = 'User added.';
		return $message;
    }
    public function updateProfileWithPassword($data){
        $sql = "UPDATE users SET email = ?, first_name = ?, last_name = ?, password = ? where uID = ?";
        $this->db->execute($sql, array($data['email'],$data['first_name'],$data['last_name'],$data['password'], $data['uID']));
		$message = 'User added with password.';
		return $message;
    }
//setting the get paramater
    public function setUserID($UID){
        $this->uID = $UID;
    }
    public function getUserID(){
        return $this->uID;
    }
}