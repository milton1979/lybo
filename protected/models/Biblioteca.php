<?php

/**
 * This is the model class for table "biblioteca".
 *
 * The followings are the available columns in table 'biblioteca':
 * @property integer $idbiblioteca
 * @property string $nombre
 * @property string $direccion
 * @property integer $idciudad
 * @property string $telefono
 * @property string $email
 * @property string $web
 * @property string $horario
 *
 * The followings are the available model relations:
 * @property Ciudad $idciudad0
 * @property Ejemplar[] $ejemplars
 * @property Empleado[] $empleados
 * @property Socio[] $socios
 */
class Biblioteca extends CActiveRecord
{
        public $ciudad;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Biblioteca the static model class
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
		return 'biblioteca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, direccion, idciudad, telefono, email, horario', 'required'),
			array('idciudad', 'numerical', 'integerOnly'=>true),
                        array('email', 'email'),
			array('nombre, direccion, telefono, email, web, horario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idbiblioteca, nombre, direccion, idciudad, telefono, email, web, horario, ciudad', 'safe', 'on'=>'search'),
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
			'idciudad0' => array(self::BELONGS_TO, 'Ciudad', 'idciudad'),
			'ejemplars' => array(self::HAS_MANY, 'Ejemplar', 'idbiblioteca'),
			'empleados' => array(self::HAS_MANY, 'Empleado', 'idbiblioteca'),
			'socios' => array(self::HAS_MANY, 'Socio', 'idbiblioteca'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idbiblioteca' => 'Biblioteca',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'idciudad' => 'Ciudad',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'web' => 'Web',
			'horario' => 'Horario',
                        'ciudad'=>'Ciudad'
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
                $criteria->with = array('idciudad0');

		$criteria->compare('idbiblioteca',$this->idbiblioteca);
		$criteria->compare('biblioteca.nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('idciudad',$this->idciudad);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('horario',$this->horario,true);
                $criteria->compare('idciudad0.nombre',$this->ciudad,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort' => array(
                            'attributes' => array(
                                'ciudad' => array(
                                    'asc' => 'idciudad0.nombre ASC',
                                    'desc' => 'idciudad0.nombre DESC',
                                 ),
                                '*'
                            )
                        )
		));
	}
}