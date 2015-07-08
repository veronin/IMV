<?php

class ReportesModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'reportes.models.*',
			'reportes.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
                //if(!Yii::app()->user->checkAccess('reportes_default'))
                //    throw new CHttpException('No tiene permiso', 403);

                if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
