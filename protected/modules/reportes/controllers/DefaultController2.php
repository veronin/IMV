<?php

class DefaultController extends Controller
{
     
	public function actionIndex()
	{
            $listaPersonas=Persona::model()->findAll();
		$this->render('index', array('personas'=>$listaPersonas));
	}
}