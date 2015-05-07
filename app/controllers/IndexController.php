<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Welcome');
        parent::initialize();
    }

    public function indexAction()
    {
    	if($this->session->has("auth")){
			$this->tag->setTitle('运营后台');
		}
		else{
			return $this->response->redirect('session/start');
		}
    }
    

}
