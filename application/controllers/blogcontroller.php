
<?php

class BlogController extends Controller{
	
	public $postObject;
	public $commentObject;

   	public function post($pID){

		$this->postObject = new Post();
		$this->commentObject = new Comments();

		$post = $this->postObject->getPost($pID);
		if(isset($_POST['btnDelete'])){
			$pID = $_POST['post_id'];
			$commentID = $_POST['comment_id'];
			$uid = $_POST['userid'];
			$DeleteComments = $this->commentObject->deleteComments($uid, $commentID, $pID);
            $post = 'Refresh';
		}
		$this->set('post',$post);

        $comments = $this->commentObject->getComments($pID);
		$this->set('comments',$comments);		
   	}
	
	public function index(){
		$this->postObject = new Post();
		$this->commentObject = new Comments();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);


		if(isset($_POST['btnSubmit'])){
			$postid = $_POST['postid'];
			$uid = $_POST['userid'];
			$txtMessage = $_POST['txtMessage'];
			$insertData = $this->commentObject->postComments($postid , $uid, $txtMessage);
        }
	}
	public function category($cID){
		$this->postObject = new Post();
		$title = $this->postObject->getCategoriesTitle($cID);
		
		$this->set('title', $title);
		$Results = $this->postObject->getCategories($cID);
		$title = $this->postObject->getCategoriesTitle($cID);
		$this->set('results', $Results);
	

	}
}

?>
