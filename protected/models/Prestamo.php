<?php

/**
 * This is the model class for table "prestamo".
 *
 * The followings are the available columns in table 'prestamo':
 * @property integer $id
 * @property string $retiro
 * @property string $devolucion
 * @property string $observacion
 * @property integer $idejemplar
 * @property integer $idsocio
 * @property integer $idtipo
 * @property integer $idempleado
 *
 * The followings are the available model relations:
 * @property Ejemplar $idejemplar0
 * @property Socio $idsocio0
 * @property Tipoprestamo $idtipo0
 * @property Empleado $idempleado0
 */
class Prestamo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Prestamo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'prestamo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('retiro, devolucion, idejemplar, idsocio, idtipo', 'required'),
			array('idejemplar, idsocio, idtipo, idempleado', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, retiro, devolucion, observacion, idejemplar, idsocio, idtipo, idempleado', 'safe', 'on'=>'search'),
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
			'idejemplar0' => array(self::BELONGS_TO, 'Ejemplar', 'idejemplar'),
			'idsocio0' => array(self::BELONGS_TO, 'Socio', 'idsocio'),
			'idtipo0' => array(self::BELONGS_TO, 'Tipoprestamo', 'idtipo'),
			'idempleado0' => array(self::BELONGS_TO, 'Empleado', 'idempleado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'retiro' => 'Retiro',
			'devolucion' => 'Devolucion',
			'observacion' => 'Observacion',
			'idejemplar' => 'Ejemplar',
			'idsocio' => 'Socio',
			'idtipo' => 'Tipo',
			'idempleado' => 'Idempleado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('retiro',$this->retiro,true);
		$criteria->compare('devolucion',$this->devolucion,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('idejemplar',$this->idejemplar);
		$criteria->compare('idsocio',$this->idsocio);
		$criteria->compare('idtipo',$this->idtipo);
		$criteria->compare('idempleado',$this->idempleado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}