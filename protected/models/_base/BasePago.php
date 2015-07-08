<?php

/**
 * This is the model class for table "pago".
 *
 * The followings are the available columns in table 'pago':
 * @property integer $idPago
 * @property integer $idRecibo
 * @property string $fecha
 * @property integer $numero
 * @property integer $serie
 * @property double $importe
 * @property integer $idMedioPago
 * @property integer $idUsuario
 *
 * The followings are the available model relations:
 * @property Recibo $idRecibo0
 * @property MedioPago $idMedioPago0
 */
class BasePago extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUsuario', 'required'),
			array('idRecibo, numero, serie, idMedioPago, idUsuario', 'numerical', 'integerOnly'=>true),
			array('importe', 'numerical'),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPago, idRecibo, fecha, numero, serie, importe, idMedioPago, idUsuario', 'safe', 'on'=>'search'),
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
			'idMedioPago0' => array(self::BELONGS_TO, 'MedioPago', 'idMedioPago'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPago' => 'Id Pago',
			'idRecibo' => 'Id Recibo',
			'fecha' => 'Fecha',
			'numero' => 'Numero',
			'serie' => 'Serie',
			'importe' => 'Importe',
			'idMedioPago' => 'Id Medio Pago',
			'idUsuario' => 'Id Usuario',
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

		$criteria->compare('idPago',$this->idPago);
		$criteria->compare('idRecibo',$this->idRecibo);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('numero',$this->numero);
		$criteria->compare('serie',$this->serie);
		$criteria->compare('importe',$this->importe);
		$criteria->compare('idMedioPago',$this->idMedioPago);
		$criteria->compare('idUsuario',$this->idUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pago the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
