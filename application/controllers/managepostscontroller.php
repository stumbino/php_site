<?php

class ManagePostsController extends Controller{
	
	public $postObject;

	protected $access = "1";
	
	public function index(){

		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);
	}
	
	public function add(){
		$this->postObject = new Post();
		$this->getCategories();
		$this->set('task', 'save');
		$this->index();
	}
	
	public function save(){
		$this->postObject = new Post();
		$data = array('title'=>$_POST['title'],'content'=>$_POST['content'],'category'=>$_POST['category'],'date'=>$_POST['date'],'uID'=>$_SESSION['uID']);
		//$this->getCategories();
			
		$result = $this->postObject->addPost($data);
		$this->set('message', $result);
		$this->index();
	}
	
	public function edit(){
		$this->postObject = new Post();
		$post = $this->postObject->getPost($_POST['pID']);
		$this->getCategories();
			
		$this->set('pID', $post['pID']);
		$this->set('title', $post['title']);
		$this->set('content', $post['content']);
		$this->set('date', $post['date']);
		$this->set('category', $post['categoryid']);
		$this->set('task', 'update');
	}
	
	public function getCategories(){
		$this->postObject = new Categories();
		$categories = $this->postObject->getCategories();
		$this->set('categories',$categories);
	}
	
	public function delete(){
		$this->postObject = new Post();
		$pID = ($_POST['pID']);	
		$this->postObject->deletePost($pID);
		$this->set('message', 'Post Deleted');	
		$this->index();
	}
	public function update(){
		$data = array('title'=>$_POST['title'],'content'=>$_POST['content'],'category'=>$_POST['category'],'date'=>$_POST['date'],'pID'=>$_POST['pID']);

		$this->postObject = new Post();
		
		$result = $this->postObject->updatePost($data);
		$outcome = $this->postObject->getAllPosts();
		$this->set('posts',$outcome);
		$this->set('message', $result);
		$this->getCategories();
		$this->set('task', 'update');
	}
	
}
