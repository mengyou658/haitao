<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Hidden;
class CategoryForm extends Form{
	Public function initialize($entity=null,$option=array()){
		if(!isset($option['edit'])){
			$element=new Text("id");
			$this->add($element->setLabel("id"));
		}else{
			$this->add(new Hidden("id"));
		}
		
		$name=new Text("name");
		$name->addValidator(new PresenceOf(array(
			'message'=>'The name is required'
		)));
		$name->setLabel("分类名称");
		$this->add($name);
		
		$isParent = new select('isParent', array("0"=>"否",'1' => '是'),array("value"=>1));
        $isParent->setLabel("是");
		$this->add($isParent);
		
		
		$parentId=new select("parentId",Category::find("isParent=1 and status=1"),
			array("using"=>array("id","name"),
			'useEmpty'   => true,
            'emptyText'  => '...',
            'emptyValue' => '0',
			"value"=>0
			));
		$parentId->setlabel("父类名称：");
		$this->add($parentId);
		
	}
}