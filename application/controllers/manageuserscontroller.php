
<?php

class ManageUsersController extends Controller{
	
	public $userObject;
  	protected $access = 1;
	public function index(){
		$this->userObject = new Users();
		$users = $this->userObject->getAllUsers();
		$this->set('title', 'The Manage Users View');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);
		$this->set('active', $active);
	}	
	public function edit(){
		$this->postObject = new Post();
		$uID = $_POST['userID']; 
		$post = $this->postObject->getPost($uID);
	//	$this->getCategories();
		$this->set('title', 'The Edit User');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);
		$this->set('active', $active);
	}
	public function approve(){
		$this->userObject = new Users();
		$uID = $_POST['userID']; 
		$this->userObject->addApprove($uID);
		$this->set('message', 'User Approved');	
		$this->index();

	}
	public function delete(){
		$this->postObject = new Users();
		$uID = $_POST['userID'];
		echo $uID."UID";	
		$this->postObject->delete($uID);
		$this->set('message', 'Post Deleted');	
		$this->index();

	}
}

?>
