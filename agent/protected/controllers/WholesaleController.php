<?php

class WholesaleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/drp';


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Wholesale;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Wholesale']))
		{
			$model->attributes=$_POST['Wholesale'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$categories = Utils::getModelTree(Category::model()->findAll(), 'cat_id', 'parent_id');
		$brands = Brand::model()->findAll();
		$tmp = array(array('brand_id'=>0, 'brand_name'=>Utils::t("All Brands")));
		$brands = array_merge($tmp, $brands);
		$goods = array();

		$categories_opt = Utils::generateOptionTree($categories, '', 'cat_name', 0);
		$this->render('create',array(
			'model'=>$model,
			'categories'=>$categories_opt,
			'brands'=>$brands,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Wholesale']))
		{
			$model->attributes=$_POST['Wholesale'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * List all models.
	 */
	public function actionList()
	{
		$model=new Wholesale('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Wholesale']))
			$model->attributes=$_GET['Wholesale'];

		$this->render('list',array(
			'model'=>$model,
		));
	}

	public function actionSearch()
	{
		$criteria = new CDbCriteria;
		if(isset($_POST['cat_id']))
			echo HI;
			$criteria.compare('cat_id', $_POST['cat_id']);
		if(isset($_POST['brand_id']))
			$criteria.compare('brand_id', $_POST['brand_id']);
		if(isset($_POST['keyword']))
			$criteria.addSearchCondition('goods_name', $_POST['keyword']);

		$data = Goods::model()->findAll($criteria);
		foreach($data as $item) {
			echo CHtml::tag('option', array('value'=>$item['goods_id']), $item['goods_name'], true);
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Wholesale::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='wholesale-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
