<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\File;

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
		
		
         $category = new Select('category_id', Category::find("isParent=0 and status=1"), array(
            'using'      => array('id', 'name'),
            'useEmpty'   => true,
            'emptyText'  => '...',
            'emptyValue' => ''
        ));
        $category->setLabel('类型');
        $this->add($category);
        
        $country = new Select('country_id', Country::find(), array(
            'using'      => array('id', 'name'),
            'useEmpty'   => true,
            'emptyText'  => '...',
            'emptyValue' => ''
        ));
        $country->setLabel('国家');
        $this->add($country);
        
		$price=new Text("price");
		$price->setLabel("价格");
		$this->add($price);
		
		$stock=new Text("stock");
		$stock->setLabel("库存");
		$this->add($stock);
		
		$color=new Text("color");
		$color->addValidator(new PresenceOf(array(
			'message'=>'The color is required'
		)));
		$color->setLabel("颜色");
		$this->add($color);
		
		$size=new Text("size");
		$size->addValidator(new PresenceOf(array(
			'message'=>'The size is required'
		)));
		$size->setLabel("尺码");
		$this->add($size);
		
		$covImg=new File("covImg");
		$covImg->setLabel("主图");
		$this->add($covImg);
		
	}
}