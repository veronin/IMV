<?php

/**
 * This is the model class for table "itemRecibo".
 *
 * The followings are the available columns in table 'itemRecibo':
 * @property integer $idItemRecibo
 * @property integer $idRecibo
 * @property double $importe
 * @property integer $idMatricula
 * @property string $pago
 *
 * The followings are the available model relations:
 * @property Recibo $idRecibo0
 * @property Matricula $idMatricula0
 */
class BaseItemRecibo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'itemRecibo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idRecibo, idMatricula', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			array('pago', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idItemRecibo, idRecibo, importe, idMatricula, pago', 'safe', 'on'=>'search'),
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
			'idRecibo0' => array(self::BELONGS_TO, 'Recibo', 'idRecibo'),
			'idMatricula0' => array(self::BELONGS_TO, 'Matricula', 'idMatricula'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idItemRecibo' => 'Id Item Recibo',
			'idRecibo' => 'Id Recibo',
			'importe' => 'Importe',
			'idMatricula' => 'Id Matricula',
			'pago' => 'Pago',
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

		$criteria->compare('idItemRecibo',$this->idItemRecibo);
		$criteria->compare('idRecibo',$this->idRecibo);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('idMatricula',$this->idMatricula);
		$criteria->compare('pago',$this->pago,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemRecibo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
