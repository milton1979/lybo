<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property integer $dni
 * @property string $usuario
 * @property string $pass
 * @property string $nombre
 * @property string $apellido
 * @property integer $idciudad
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property integer $estado
 * @property integer $admin
 *
 * The followings are the available model relations:
 * @property Empleado[] $empleados
 * @property Socio[] $socios
 * @property Ciudad $idciudad0
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dni, usuario, pass, nombre, apellido, idciudad, direccion, telefono, email, estado', 'required'),
			array('dni, idciudad, estado, admin', 'numerical', 'integerOnly'=>true),
			array('usuario, pass, email', 'length', 'max'=>50),
			array('nombre, apellido, direccion, telefono', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dni, usuario, pass, nombre, apellido, idciudad, direccion, telefono, email, estado, admin', 'safe', 'on'=>'search'),
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
			'empleados' => array(self::HAS_MANY, 'Empleado', 'idusuario'),
			'socios' => array(self::HAS_MANY, 'Socio', 'idusuario'),
			'idciudad0' => array(self::BELONGS_TO, 'Ciudad', 'idciudad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dni' => 'Dni',
			'usuario' => 'Usuario',
			'pass' => 'Pass',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'idciudad' => 'Idciudad',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'estado' => 'Estado',
			'admin' => 'Admin',
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
		$criteria->compare('dni',$this->dni);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('idciudad',$this->idciudad);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('admin',$this->admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}