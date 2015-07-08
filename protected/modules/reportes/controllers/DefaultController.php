<?php

class DefaultController extends Controller
{
        public function actionIndex()
	{
		$this->render('index');
	}
    
        public function actionObtenerUsuarios()
	{
		/*$lista = array(
                    array('idUsuario'=>95, 'nombre'=>'Silvina'),
                    array('idUsuario'=>96, 'nombre'=>'Carolina'),
                    );*/
                $criterio=new CDbCriteria();
                $criterio->select='idUsuario,nombre';//los otros campos van en null
                $lista=Usuario::model()->findAll($criterio);
                echo CJSON::encode($lista);
                exit();
	}
        
        public function actionCrearUsuario()
	{
		$contenidoFlujo = file_get_contents("php://input");
		$objetoUsuario = CJSON::decode($contenidoFlujo, false);
		$model = new Usuario;
		$model->nombre = $objetoUsuario->nombre;
		$model->save();
		echo CJSON::encode($model);
		exit();
	}
	public function actionModificarUsuario()
	{
		$contenidoFlujo = file_get_contents("php://input");
		$objetoUsuario = CJSON::decode($contenidoFlujo, false);//false no sea array
		$model = Usuario::model()->findByPk($objetoUsuario->idUsuario);
		$model->nombre = $objetoUsuario->nombre;
		$model->save();
		echo CJSON::encode($model);
		exit();
		
	}
        
        public function actionBorrarUsuario()
	{
		$contenidoFlujo = file_get_contents("php://input");
		$objetoUsuario = CJSON::decode($contenidoFlujo, false);
		$model = Usuario::model()->findByPk($objetoUsuario->idUsuario)->delete();
		exit();
		
	}
	/*public $layout="//layouts/bootstrapLayout";
	
	public function filters()
	{	
		return array(
			array('application.extensions.booster.filters.BoosterFilter + index')
		);
	}*/	

}