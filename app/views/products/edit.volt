
<div class="well">
	<form method="post" action="{{url("products/create")}}">
		<?php 
			foreach($form as $element){
				$messages=$form->getMessagesFor($element->getName());
				if(count($messages)){
					echo '<div class="message">';
					foreach($messages as $message){
						echo $message;
					}
					echo '</div>';
				}
				if (is_a($element, 'Phalcon\Forms\Element\Hidden')){
					echo $element;
				}else if (is_a($element, 'Phalcon\Forms\Element\File')){
					echo '<div class="form-group">';
					echo '<label for="', $element->getName(), '">', $element->getLabel(), '</label>';
					echo $element->render();
					echo '</div>';
				}else{
					echo '<div class="form-group">';
					echo '<label for="', $element->getName(), '">', $element->getLabel(), '</label>';
					echo $element->render(array('class' => 'form-control'));
					echo '</div>';
				}
			}
		?>	
		<input type="submit" class="btn btn-default" value="提交">
	</form>

 

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>


                   
    




