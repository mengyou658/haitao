<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Hidden;

class ProductsForm extends Form{
	
	public function initialize($entity=null,$options=array()){
		if(!isset($options['edit'])){
			$element=new Text("id");
			$this->add($element->setLabel("Id"));
		}else{
			$this->add(new Hidden("id"));
		}
		$name=new Text("name");
		$name->addValidator(new PresenceOf(array(
			'message'=>'The name is required'
		)));
		$name->setLabel("名称");
		$this->add($name);
		
		 $type = new Select('product_types_id', ProductTypes::find(), array(
            'using'      => array('id', 'name'),
            'useEmpty'   => true,
            'emptyText'  => '...',
            'emptyValue' => ''
        ));
        $type->setLabel('类型');
        $this->add($type);
		
		$price=new Text("price");
		$price->setLabel("价格");
		$this->add($price);
		
		
	}
}