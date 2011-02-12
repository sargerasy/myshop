<?php

/**
 * This is the model class for table "ecsx_price_strategy".
 *
 * The followings are the available columns in table 'ecsx_price_strategy':
 * @property integer $id
 * @property integer $quantity
 * @property double $price
 * @property double $commision
 * @property integer $wholesale_id
 *
 * The followings are the available model relations:
 * @property Wholesale $wholesale
 */
class PriceStrategy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PriceStrategy the static model class
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
		return 'ecsx_price_strategy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('quantity, price, commision, wholesale_id', 'required'),
			array('wholesale_id', 'numerical', 'integerOnly'=>true),
			array('quantity, price, commision', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, quantity, price, commision, wholesale_id', 'safe', 'on'=>'search'),
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
			'wholesale' => array(self::BELONGS_TO, 'Wholesale', 'wholesale_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'quantity' => 'Quantity',
			'price' => 'Price',
			'commision' => 'Commision',
			'wholesale_id' => 'Wholesale',
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
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('price',$this->price);
		$criteria->compare('commision',$this->commision);
		$criteria->compare('wholesale_id',$this->wholesale_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
