<?php

class CategoryController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Category');
        parent::initialize();
    }

    public function indexAction()
    {
		
		$Category=Category::find("isParent=1 and status=1");
		
		$this->view->setVar("category",$Category);
    }
    public function newAction(){
    	
    		$this->view->form=new CategoryForm(null, array('edit' => true));
    	
    }
	public function createAction(){
		$form=new CategoryForm();
		$category=new Category();
		$data=$this->request->getPost();
		
		if(!$form->isvalid($data,$category)){
			foreach ($form->getMessages() as $message){
				$this->flash->error($message);
			}
			return $this->forward("category/new");
		}
		
		if(!$category->save()){
			foreach ($category->getMessages() as $message){
				$this->flash->error($message);
			}
			return $this->forward("category/new");
		}
		
		$form->clear();
		$this->flash->success("提交成功");	
		return $this->forward("category/index");
		
	}
public function deleteAction($id){
		$category=Category::findFirstById($id);
		if(!$category){
			return $this->flash->error("产品不存在");
		}
		if(!$category->save(array("status"=>"0"))){
			foreach ($category->getMessages() as $message){
				return $this->flash->error($message);
			}
		}
		
		 $this->flash->success("删除成功");
		 
		 return $this->forward("category/index");
		
	}
	public function editAction($id){
		if(!$this->request->isPost()){
			$category=Category::findFirstById($id);
			if(!$category){
				$this->flash->error("该分类不存在");
				return $this->forward("category/index");
			}
			$this->view->form=new CategoryForm($category,array('edit'=>true));
		}
		
	}
	public function showChildAction($id){
		$Category=Category::find("parentId=".$id." and status=1");
		$parent=Category::findfirst("id=".$id);
		$this->view->setVar("parent",$parent);
		$this->view->setVar("category",$Category);
	}
}
