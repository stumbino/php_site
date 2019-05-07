<?php

class MembersController extends Controller{
	
	public $userObject;
	public function users($uID){
		$this->userObject = new Users();
		$user = $this->userObject->getUser($uID);	    
	  	$this->set('user',$user);
   	}
	public function index(){
		$this->userObject = new Users();
		$users = $this->userObject->getAllUsers();
		$this->set('title', 'The Members View');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);
	}
	public function profile($uID){
		
		$this->postObject = new Users(); 
		$post = $this->postObject->getUserFromID($uID);
		$this->postObject->setUserID($UID);
	//	print_r($post);
//		$this->getCategories();
		$this->set('title', 'The Profile View');
		//$this->set('users',$users);
		$this->set('first_name', $post['first_name']);
		$this->set('last_name',$post['last_name']);
		$this->set('email',$post['email']);
	}
	public function update(){
		$this->postObject = new Users();
		$password = $_POST['password'];
		$password2 = $_POST['passwordtwo'];
		//if pass is not empty it will insert a new passhash password if it is empty it will not insert a password to database so it keeps original
		if(!empty($password)){
			if($password == $password2){
				$passhash = password_hash($password,PASSWORD_DEFAULT);
				$data = array('uID'=>$this->postObject->getUserID(),'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email'], 'password'=>$passhash);
				$this->postObject->updateProfileWithPassword($data);
			}else{
				$this->set('message','password doesnt match');
			}
		}else{
		$data = array('uID'=>$this->postObject->getUserID(),'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email']);
		$this->postObject->updateProfile($data);
		}
		$this->set('message','password set');
		$this->index();
	}
}

?>