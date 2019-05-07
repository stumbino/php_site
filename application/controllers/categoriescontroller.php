<?php
class CategoriesController extends Controller{
	
	protected $categoryObject;
	public function index(){
		
	}
	public function getCategories(){
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->getCategories();
		}
		
	public function edit(){
		$this->categoryObject = new Categories;
		$cID = $_POST['categoryID'];
		$outcome = $this->categoryObject->getCategory($cID);
		$this->set('categoryname', $_POST['categorytitle']);
		$this->set('categoryID', $cID);
		$this->set('category', $outcome);
	}

	public function update(){
		$cID = $_POST['categoryID'];
		$name = $_POST['categoryTitle'];
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->update($cID,$name);

		if($outcome){
			$this->set('message','Category updated.');
		}
		else{
			$this->set('message','Category update failed.');
		}
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);
	}

	public function add(){
		$new = $_POST['category'];
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->addCategory($new);

		if(isset($outcome) and !empty($outcome)){
			$this->set('message','Category added.');
		}
		else{
			$this->set('message','Category add failed.');
		}
		
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);
	}
	public function delete(){
		$this->categoryObject = new Categories;
		$cID = $_POST['categoryID'];
		$this->categoryObject->deleteCategories($cID);
		$this->set('message', 'Post Deleted');
		$this->index();	
	}
	
}
?>