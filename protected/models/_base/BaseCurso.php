<?php

/**
 * This is the model class for table "curso".
 *
 * The followings are the available columns in table 'curso':
 * @property integer $idCurso
 * @property string $codigo
 * @property string $descripcion
 * @property integer $idNivel
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property integer $cupoAlumnos
 * @property integer $cantAlumnos
 * @property string $seccion
 *
 * The followings are the available model relations:
 * @property Nivel $idNivel0
 * @property Matricula[] $matriculas
 */
class BaseCurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idNivel, cupoAlumnos, cantAlumnos', 'numerical', 'integerOnly'=>true),
			array('codigo', 'length', 'max'=>10),
			array('descripcion', 'length', 'max'=>45),
			array('seccion', 'length', 'max'=>1),
			array('fechaInicio, fechaFin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCurso, codigo, descripcion, idNivel, fechaInicio, fechaFin, cupoAlumnos, cantAlumnos, seccion', 'safe', 'on'=>'search'),
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
			'idNivel0' => array(self::BELONGS_TO, 'Nivel', 'idNivel'),
			'matriculas' => array(self::HAS_MANY, 'Matricula', 'idCurso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCurso' => 'Id Curso',
			'codigo' => 'Codigo',
			'descripcion' => 'Descripcion',
			'idNivel' => 'Id Nivel',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
			'cupoAlumnos' => 'Cupo Alumnos',
			'cantAlumnos' => 'Cant Alumnos',
			'seccion' => 'Seccion',
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

		$criteria->compare('idCurso',$this->idCurso);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idNivel',$this->idNivel);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);
		$criteria->compare('cupoAlumnos',$this->cupoAlumnos);
		$criteria->compare('cantAlumnos',$this->cantAlumnos);
		$criteria->compare('seccion',$this->seccion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
