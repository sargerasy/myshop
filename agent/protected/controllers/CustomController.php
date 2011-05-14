<?php

class CustomController extends Controller
{
	public function actionIndex()
	{
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/wholesale.js");
		$models = Wholesale::model()->findAll();
		
		$this->render('index', array(
			'models' => $models,
			'carts' => Utils::getWholesaleCarts(),
		));
	}

	public function actionAdd2cart() 
	{
		if(isset($_POST['count']) && isset($_POST['ws_id'])) {
			$count = intval($_POST['count']);
			$ws_id = $_POST['ws_id'];
			$ws = Wholesale::model()->findByPk($ws_id);
			if($count <= 0)
				throw new CHttpException(400, 'Count Must larger than 0');
			if(!$ws) 
				throw new CHttpException(400,'Can not find the Wholesale');
			$price = $ws->findPrice($count);
			$cart = array(
				'count'=>$count,
				'price'=>(float)$price,
				'goods_name'=>$ws->goods->goods_name,
				'drop_label'=>Utils::t("drop"),
			);
			$key = Utils::addWholesaleCart($cart);
			$cart['drop_url'] = $this->createUrl('custom/dropCart', array('key'=>$key));
			$cart['goods_url'] = "../goods.php?id=".$ws->goods_id;
			echo CJSON::encode($cart);
		}
	}

	public function actionDropCart($key)
	{
		Utils::dropWholesaleCart($key);
		echo "Success";
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
