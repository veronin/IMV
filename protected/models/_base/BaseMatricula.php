<?php

/**
 * This is the model class for table "matricula".
 *
 * The followings are the available columns in table 'matricula':
 * @property integer $idMatricula
 * @property integer $idAlumno
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $motivoBaja
 * @property integer $idCurso
 * @property string $formaPago
 * @property string $medioPago
 * @property integer $idCuenta
 * @property integer $idDescuento
 * @property integer $ciclo
 *
 * The followings are the available model relations:
 * @property ItemRecibo[] $itemRecibos
 * @property Alumno $idAlumno0
 * @property Cuenta $idCuenta0
 * @property Curso $idCurso0
 * @property Descuento $idDescuento0
 */
class BaseMatricula extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'matricula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idAlumno, idCurso, idCuenta, idDescuento, ciclo', 'numerical', 'integerOnly'=>true),
			array('motivoBaja, formaPago, medioPago', 'length', 'max'=>100),
			array('fechaInicio, fechaFin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idMatricula, idAlumno, fechaInicio, fechaFin, motivoBaja, idCurso, formaPago, medioPago, idCuenta, idDescuento, ciclo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'itemRecibos' => array(self::HAS_MANY, 'ItemRecibo', 'idMatricula'),
			'idAlumno0' => array(self::BELONGS_TO, 'Alumno', 'idAlumno'),
			'idCuenta0' => array(self::BELONGS_TO, 'Cuenta', 'idCuenta'),
			'idCurso0' => array(self::BELONGS_TO, 'Curso', 'idCurso'),
			'idDescuento0' => array(self::BELONGS_TO, 'Descuento', 'idDescuento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMatricula' => 'Id Matricula',
			'idAlumno' => 'Id Alumno',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
			'motivoBaja' => 'Motivo Baja',
			'idCurso' => 'Id Curso',
			'formaPago' => 'Forma Pago',
			'medioPago' => 'Medio Pago',
			'idCuenta' => 'Id Cuenta',
			'idDescuento' => 'Id Descuento',
			'ciclo' => 'Ciclo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idMatricula',$this->idMatricula);
		$criteria->compare('idAlumno',$this->idAlumno);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);
		$criteria->compare('motivoBaja',$this->motivoBaja,true);
		$criteria->compare('idCurso',$this->idCurso);
		$criteria->compare('formaPago',$this->formaPago,true);
		$criteria->compare('medioPago',$this->medioPago,true);
		$criteria->compare('idCuenta',$this->idCuenta);
		$criteria->compare('idDescuento',$this->idDescuento);
		$criteria->compare('ciclo',$this->ciclo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Matricula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
