<?php

/**
 * This is the model class for table "ecs_category".
 *
 * The followings are the available columns in table 'ecs_category':
 * @property integer $cat_id
 * @property string $cat_name
 * @property string $keywords
 * @property string $cat_desc
 * @property integer $parent_id
 * @property integer $sort_order
 * @property string $template_file
 * @property string $measure_unit
 * @property integer $show_in_nav
 * @property string $style
 * @property integer $is_show
 * @property integer $grade
 * @property string $filter_attr
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'ecs_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('style', 'required'),
			array('parent_id, sort_order, show_in_nav, is_show, grade', 'numerical', 'integerOnly'=>true),
			array('cat_name', 'length', 'max'=>90),
			array('keywords, cat_desc, filter_attr', 'length', 'max'=>255),
			array('template_file', 'length', 'max'=>50),
			array('measure_unit', 'length', 'max'=>15),
			array('style', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cat_id, cat_name, keywords, cat_desc, parent_id, sort_order, template_file, measure_unit, show_in_nav, style, is_show, grade, filter_attr', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cat_id' => 'Cat',
			'cat_name' => 'Cat Name',
			'keywords' => 'Keywords',
			'cat_desc' => 'Cat Desc',
			'parent_id' => 'Parent',
			'sort_order' => 'Sort Order',
			'template_file' => 'Template File',
			'measure_unit' => 'Measure Unit',
			'show_in_nav' => 'Show In Nav',
			'style' => 'Style',
			'is_show' => 'Is Show',
			'grade' => 'Grade',
			'filter_attr' => 'Filter Attr',
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

		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('cat_name',$this->cat_name,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('cat_desc',$this->cat_desc,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('template_file',$this->template_file,true);
		$criteria->compare('measure_unit',$this->measure_unit,true);
		$criteria->compare('show_in_nav',$this->show_in_nav);
		$criteria->compare('style',$this->style,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('grade',$this->grade);
		$criteria->compare('filter_attr',$this->filter_attr,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}