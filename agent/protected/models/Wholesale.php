<?php

/**
 * This is the model class for table "ecsx_wholesale".
 *
 * The followings are the available columns in table 'ecsx_wholesale':
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property integer $goods_id
 * @property integer $enable
 */
class Wholesale extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wholesale the static model class
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
		return 'ecsx_wholesale';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, desc, goods_id, enable', 'required'),
			array('goods_id, enable', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, desc, goods_id, enable', 'safe', 'on'=>'search'),
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
			'price_strategies'=>array(self::HAS_MANY, 'PriceStrategy', 'wholesale_id', 'order'=>'quantity'),
			'goods'=>array(self::BELONGS_TO, 'Goods', 'goods_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'desc' => 'Desc',
			'goods_id' => 'Goods',
			'enable' => 'Enable',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('enable',$this->enable);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function findPrice($count)
	{
		$ps = $this->price_strategies;
		$price = 0;
		foreach($ps as $e) {
			if($count >= $e->quantity) {
				$price = $e->price;
			}
			else
				break;
		}
		return $price;
	}
}
