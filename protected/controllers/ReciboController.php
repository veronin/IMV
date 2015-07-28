<?php

class ReciboController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'pdf'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'generarRecibos'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Recibo;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

        if (isset($_POST['BaseRecibo'])) {
            $model->attributes = $_POST['BaseRecibo'];
            if ($model->save()){
                Yii::app()->user->setFlash('success',"Recibo creado.");
            $this->redirect(array('view', 'id' => $model->idRecibo));}
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

        if (isset($_POST['BaseRecibo'])) {
            $model->attributes = $_POST['BaseRecibo'];
            if ($model->save()){
                Yii::app()->user->setFlash('success',"Recibo modificado.");
            
                $this->redirect(array('view', 'id' => $model->idRecibo));}
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
    // we only allow deletion via POST request
            $this->loadModel($id)->delete();
            Yii::app()->user->setFlash('success',"Recibo eliminado.");
    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
    
    public function actionPdf() {
        $this->render('pdf');
    }
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Recibo');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Recibo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Recibo']))
            $model->attributes = $_GET['Recibo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Recibo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'recibo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGenerarRecibos() {
    
    // Verifico que no estén ya generados los recibos del periodo
        
        $criteria0 = new CDbCriteria();
        $criteria0->condition = "ciclo = :ciclo AND mes = :mes";
        $criteria0->params = array(':mes'=>8, ':ciclo'=>2015);
        
        $rec = Recibo::model()->findAll($criteria0); 
        $recibos = new Recibo();
        $transaction=$recibos->dbConnection->beginTransaction();
        try
        {
        if (count($rec)==0){
            
            
        // Por cada cuenta creo un recibo para el mes  

        $cuentas = Cuenta::model()->findAll();
        
        foreach ($cuentas as $cuenta):
            
            $cta = $cuenta->idCuenta;
        
            $recibos = new Recibo();
           
            $recibos->idCuenta = $cta;
            $recibos->concepto = 'CUOTA';
            $recibos->fechaEmision = date('Y-m-d H:i:s');
            $recibos->mes = date('m');
            $recibos->ciclo = date('Y');
            if(!$recibos->save()){
                throw new Exception ('Error al generar recibo'.CVarDumper::dumpAsString($recibos->getErrors()));
                Yii::log(CVarDumper::dumpAsString($recibos->getErrors()), 'error');
            }
            // Por cada recibo creo los item de cada alumno matriculado de ese cliente  

            $criteria = new CDbCriteria();
            $criteria->condition = "idCuenta = :idCuenta";
            $criteria->params = array(':idCuenta'=>$cta);
            
            $matriculas = Matricula::model()->findAll($criteria);
            
            $sumaImportes = 0;
            
            foreach ($matriculas as $matricula):

                $items = new ItemRecibo();

                $items->idRecibo = $recibos->idRecibo;
                $items->idMatricula = $matricula->idMatricula;
                
                $cuota = $matricula->idCurso0->idNivel0->cuota;
                $desc = $matricula->idDescuento0->porcentaje;
                
                // Aplico descuentos si los tiene
                
                if ($matricula->idDescuento !== 5){ 
                    
                    $items->importe = $cuota-(($cuota*$desc)/100);
                } else {
                    $items->importe = $cuota;}
                
                $items->pago = 0;
                $items->save();
                
                // Calculo importe total
                
                $sumaImportes = $sumaImportes+$items->importe;
                
            endforeach;
            
            $recibos->importePendiente = $sumaImportes;
            $recibos->save();
           
           
        endforeach;
        
        // Envio mensajes a la vista
        
        Yii::app()->user->setFlash('success',"El proceso fue realizado correctamente.");
                }
        
        else { 
        Yii::app()->user->setFlash('success',"Ya existen los recibos del periodo.");    
        }
        $transaction->commit();
        }
        catch(Exception $e)
        {
            $transaction->rollback();
            Yii::app()->user->setFlash('error',$e->getMessage());    
            
       
        }
        $dataProvider = new CActiveDataProvider('Recibo');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
        } 
        
    }
