<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	function __construct($id, $module=null) 
	{
		parent::__construct($id, $module);
		Yii::app()->clientScript->registerCoreScript("jquery");
	}

	public function filters()
	{
		return array(
			'accessManager',
		);
	}

	public function filterAccessManager($filterChain)
	{
		$app = Yii::app();
		$user = $app->getUser();

		if($user->checkAccess($app->controller->route)) 
			$filterChain->run();
		else
			if($user->getIsGuest())
				$user->loginRequired();
			else
				throw new CHttpException(403, Yii::t('yii', 'You are not authorized to perform this action.'));
	}
}
