<?php

class ManageCategoriesController extends Controller{
	
	public $postObject;

	protected $access = "1";
	
	public function index(){
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);	
	}
}
