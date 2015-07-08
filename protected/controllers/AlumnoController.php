<?php
class GeoIP 
{
    public $ReturnCode;
    public $IP;
    public $ReturnCodeDetails;
    public $CountryName;
    public $CountryCode; 
    
}
class GetGeoIP 
{
    public $IPAddress = "";
    
}

class AlumnoController extends Controller
{

    public function actionConecta()
	{

        $p=new GetGeoIP;
        $p->IPAddress = "98.138.253.109";
        $cliente = new SoapClient('http://www.webservicex.net/geoipservice.asmx?WSDL', 
                array('classmap'=>array('GetGeoIP'=>'GetGeoIP', 'GeoIP'=>'GeoIP'),
                      ));
        $resultado = $cliente->GetGeoIP($p);
        print_r($resultado);
        
        }
        
        

/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
    return array(
    array('allow',  // allow all users to perform 'index' and 'view' actions
    'actions'=>array('index','view','conecta','admin','exportar'),
    'users'=>array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
    'actions'=>array('create','update'),
    'users'=>array('@'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
    'actions'=>array('admin','delete'),
    'users'=>array('admin'),
    ),
    array('deny',  // deny all users
    'users'=>array('*'),
    ),
    );
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Alumno;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Alumno']))
{
$model->attributes=$_POST['Alumno'];
if($model->save())
$this->redirect(array('view','id'=>$model->idAlumno));
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Alumno']))
{
$model->attributes=$_POST['Alumno'];
if($model->save())
$this->redirect(array('view','id'=>$model->idAlumno));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Alumno');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Alumno('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Alumno']))
$model->attributes=$_GET['Alumno'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Alumno::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='alumno-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function actionExportar(){
    
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../extensions/phpexcel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(16);
$objPHPExcel->getProperties()->setTitle("Alumnos IMV");
$objPHPExcel->getActiveSheet()->getStyle('1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
$objPHPExcel->getActiveSheet()->getStyle('2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);

$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
$objPHPExcel->getActiveSheet()->getStyle('1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->SetCellValueByColumnAndRow(0, 1, "ALUMNOS IMV");
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(11);
$objPHPExcel->getActiveSheet()->SetCellValueByColumnAndRow(0, 2, "Curso");  
$objPHPExcel->getActiveSheet()->SetCellValueByColumnAndRow(1, 2, "ID");
$objPHPExcel->getActiveSheet()->SetCellValueByColumnAndRow(2, 2, "Legajo");  
$objPHPExcel->getActiveSheet()->SetCellValueByColumnAndRow(3, 2, "Apellido");  
$objPHPExcel->getActiveSheet()->SetCellValueByColumnAndRow(4, 2, "Nombre");  
$objPHPExcel->getActiveSheet()->SetCellValueByColumnAndRow(5, 2, "Telefono");  
// Set document properties
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(12);
$objPHPExcel->getProperties()->setCreator("Veronica Nin")
							 ->setLastModifiedBy("Veronica Nin")
							 ->setTitle("Alumnos IMV")
							 ->setSubject("")
							 ->setDescription("Listado completo de alumnos")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Archivo alumnos");

$sql = "SELECT a.idAlumno as id, a.legajo as leg, d.nombre as nom, d.apellido as ape, d.telefono as tel, b.codigo as cod "
    . "FROM alumno as a, curso as b, matricula as c, persona as d "
    . " WHERE b.idCurso=c.idCurso AND a.idAlumno=c.idAlumno "
    . " AND a.idPersona=d.idPersona AND c.ciclo = DATE_FORMAT( now( ) , '%Y' )-1 "
    . " ORDER BY b.codigo, d.apellido";

$cmd = Yii::app()->db->createCommand( $sql);

        
// get reader object:
$dataReader = $cmd->query();

$idx = 3; // start with 2nd row, because in 1st row there is column titles!
// read records line by line:
$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
$objPHPExcel->getActiveSheet()->getStyle('C')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);

while ( ( $rec = $dataReader->read() ) !== false )
    {
    $col=0;
    $objPHPExcel->getActiveSheet()->getRowDimension($idx)->setRowHeight(20);
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValueByColumnAndRow( $col, $idx, $rec[ 'cod' ] )
            ->setCellValueByColumnAndRow( ++$col, $idx, $rec[ 'id'] )
            ->setCellValueByColumnAndRow( ++$col, $idx, $rec[ 'leg' ] )
            ->setCellValueByColumnAndRow( ++$col, $idx, $rec[ 'ape' ] )
            ->setCellValueByColumnAndRow( ++$col, $idx, $rec[ 'nom' ] )
            ->setCellValueByColumnAndRow( ++$col, $idx, $rec[ 'tel' ] )
           ;

    ++$idx;
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Alumnos IMV');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet



// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="AlumnosIMV.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;   
}

}
?>
