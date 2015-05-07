<?php
class ProductsController extends ControllerBase{
	public function initialize(){
		$this->tag->setTitle("products");
		parent::initialize();
	}
	public function indexAction(){
		$currentPage=1;
		$currentPage=$this->request->get("page");
		
		$products=Products::find();
		
		$paginator=new \Phalcon\Paginator\Adapter\Model(
			array(
				"data"=>$products,
				"limit"=>4,
				"page"=>$currentPage
			)
		);
		
		$page=$paginator->getPaginate();
		$this->view->setVar("page",$page);
	}
	public function newAction(){
		$this->view->form=new ProductsForm(null, array('edit' => true));
	}
	
	public function createAction(){
		if(!$this->request->isPost()){
			return $this->forward("products/index");
		}
		
		$form=new ProductsForm();
		$product=new Products();
		$data=$this->request->getPost();
		
		if(!$form->isValid($data,$product)){
			foreach ($form->getMessages() as $message){
				$this->flash->error($message);
			}
			
			return $this->forward("products/new");
		}
		
		if(!$product->save()){
			foreach ($product->getMessages() as $message){
				$this->flash->error($message);
			}
			
			return $this->forward("products/new");
		}

		$form->clear();
		$this->flash->success("提交成功");	
		return $this->forward("products/index");
		
	}
	public function deleteAction($id){
		$product=Products::findFirstById($id);
		if(!$product){
			return $this->flash->error("产品不存在");
		}
		if(!$product->delete()){
			foreach ($product->getMessages() as $message){
				return $this->flash->error($message);
			}
		}
		
		 $this->flash->success("删除成功");
		 
		 return $this->forward("products/index");
		
	}
	public function editAction($id){
		if(!$this->request->isPost()){
			$product=Products::findFirstById($id);
			if(!$product){
				$this->flash->error("该商品不存在");
				return $this->forward("product/index");
			}
			$this->view->form=new ProductsForm($product,array('edit'=>true));
		}
		
	}
}