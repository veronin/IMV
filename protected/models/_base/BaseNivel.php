<?php

/**
 * This is the model class for table "nivel".
 *
 * The followings are the available columns in table 'nivel':
 * @property integer $idNivel
 * @property string $nivel
 * @property string $descripcion
 * @property integer $cuota
 *
 * The followings are the available model relations:
 * @property Curso[] $cursos
 */
class BaseNivel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nivel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cuota', 'numerical', 'integerOnly'=>true),
			array('nivel', 'length', 'max'=>10),
			array('descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idNivel, nivel, descripcion, cuota', 'safe', 'on'=>'search'),
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
			'cursos' => array(self::HAS_MANY, 'Curso', 'idNivel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idNivel' => 'Id Nivel',
			'nivel' => 'Nivel',
			'descripcion' => 'Descripcion',
			'cuota' => 'Cuota',
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

		$criteria->compare('idNivel',$this->idNivel);
		$criteria->compare('nivel',$this->nivel,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('cuota',$this->cuota);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseNivel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
