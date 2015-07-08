<?php

class PagoController extends Controller {

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
                'actions' => array('index', 'view', 'imprimir'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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
        
        $model = new Pago;
        $transaction=$model->dbConnection->beginTransaction();
        try
        {
            
        //Cargo datos en Pagos

        $recibo = $this->loadModelRecibo($_GET['id']);
        $importe = $recibo->importePendiente;
       
        if (isset($_GET['id'])) {
            $model->attributes = $_GET['id'];
            $model->idRecibo = $recibo->idRecibo;
            $model->fecha = date('Y-m-d H:i:s');
            $model->importe = $recibo->importePendiente;
            $model->idUsuario = Yii::app()->user->id;
            $model->idMedioPago = 1;
            
            
            if ($model->save()) {
                
                // Modifico Recibos actualizando datos

                $recibo->importePendiente = 0;
                $recibo->fechaCobroCompleto = $model->fecha;
                
                // Modifico la Cuenta con los saldos

                $recibo->idCuenta0->saldo = $recibo->idCuenta0->saldo - $importe;
                $recibo->save();
                
                $transaction->commit();
                
                $this->redirect(array('view', 'id' => $model->idPago));
            }
            $transaction->rollback();
        }

        $this->render('update', array('model' => $model,));
            
        }   
        catch(Exception $e)
        {
            $transaction->rollback();
            throw $e;
        }
    
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
        if (isset($_POST['BasePago'])) {
            //print_r($model);
            $model->attributes = $_POST['BasePago'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idPago));
        }

        $this->render('update', array('model' => $model,
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

    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('BasePago');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Pago('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BasePago']))
            $model->attributes = $_GET['BasePago'];

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
        $model = Pago::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pago-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function loadModelRecibo($id) {
        $model = Recibo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionGenerarPdf() {
        
        $model = Pago::model()->findAll();

        $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'A4', '', '', 15, 15, 35, 25, 9, 9, 'P');
        $mPDF1->useOnlyCoreFonts = true;
        $mPDF1->SetTitle("Reporte de Pagos");
        $mPDF1->SetAuthor("Veronica Nin");

        $mPDF1->SetDisplayMode('fullpage');
        $mPDF1->WriteHTML($this->renderPartial('pdfReport', array('model' => $model), true));
        $mPDF1->Output('Reporte_Pagos' . date('YmdHis'), 'I');
        exit;
    }

    public function actionImprimir($id) {
        
        require_once dirname(__FILE__) . '/../extensions/fpdf/fpdf.php';
         
        // Obtengo el Pago
        $model = $this->loadModel($id);
        
        // Obtengo el Recibo origen
        $recibo = $model->idRecibo0->idRecibo;
        
        // Obtengo los Items Alumnos

        $Criteria = new CDbCriteria();
        $Criteria->condition = "idRecibo = $recibo";
       
        $alumnos = ItemRecibo::model()->findAll($Criteria);
        
        $pdf = new FPDF();

        $pdf->AddPage();
        // Logo
        $pdf->Image(dirname(__FILE__) . '/../../images/logo.jpg', 10, 8, 20);
        // Arial bold 15
        $pdf->SetFont('Arial', 'B', 12);
        // Movernos a la derecha
        $pdf->Cell(30);
        // Titulo
        $pdf->Cell(20,10, 'INSTITUTO MODELO VIEDMA');
        $pdf->Cell(70);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(10, 10, 'Nro:');
        $pdf->Cell(15, 10, $model->numero);
        $pdf->Cell(13, 10, 'Serie:');
        $pdf->Cell(20, 10, $model->serie);
        $pdf->Ln(2);
        $pdf->Cell(120);
        $pdf->Cell(15, 20, 'Fecha:');
        $d = explode("-", $model->fecha); 
        $pdf->Cell(20, 20, $d[2]."/".$d[1]."/".$d[0]);
        // Salto de linea
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(40, 15);
        $pdf->Cell(20, 30, 'Senor:');
        $pdf->Cell(20, 30, $model->idRecibo0->idCuenta0->idCliente0->idPersona0->getFullName());
        $pdf->Ln(2);
        $pdf->SetXY(40, 15);
        $pdf->Cell(20, 45, 'Domicilio:');
        $pdf->Cell(50, 45, $model->idRecibo0->idCuenta0->idCliente0->idPersona0->dirCalle);
        $pdf->Cell(50, 45, $model->idRecibo0->idCuenta0->idCliente0->idPersona0->dirNro);
        $pdf->Cell(50, 45, $model->idRecibo0->idCuenta0->idCliente0->idPersona0->idLocalidad);

        $pdf->Ln(2);
        $pdf->SetFont('Arial', 'B', 11);

        $total = 0;
          $pdf->Cell(20,70,'Matricula');
          $pdf->Cell(60,70,'Alumno');
          $pdf->Cell(30,70,'Nivel');
          $pdf->Cell(30,70,'Curso');
          $pdf->Cell(10,70,'Mes');
          $pdf->Cell(20,70,'Ciclo');
          $pdf->Cell(20,70,'Importe');
          
          $l=75; //linea
          $pdf->Ln(3);
          $pdf->SetFont('Arial', 'I', 10);
          
        foreach ($alumnos as $item): 
            
          $pdf->Cell(20,$l,$item->idMatricula0->idMatricula);
          $pdf->Cell(60,$l,$item->idMatricula0->idAlumno0->idPersona0->getFullName());
          $pdf->Cell(30,$l,$item->idMatricula0->idCurso0->idNivel0->descripcion);
          $pdf->Cell(30,$l,$item->idMatricula0->idCurso0->codigo);
          $pdf->Cell(10,$l,$item->idRecibo0->mes);
          $pdf->Cell(20,$l,$item->idRecibo0->ciclo);
          $pdf->Cell(20,$l,$item->importe);

          $total=$total+$item->importe;
          $l=$l+1;
          $pdf->Ln(5);
          
        endforeach;

          $pdf->SetXY(160, 50);
          $pdf->SetFont('Arial','B',11);
          $pdf->Cell(20,100,'TOTAL:');
          $pdf->Cell(10,100,$total);
          
        $pdf->Output('Factura.pdf','D');
    }

}
