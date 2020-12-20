<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Author;

class AuthorController extends ActiveController
{
	public $modelClass = 'app\models\Author';
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index']);
		return $actions;
	}

	public function actionIndex(){

		$authors = Author::find()->joinWith('books', true)->asArray()->All();
		
		foreach ($authors as $key => $author) {
			$authors[$key]['books'] = array_slice($author['books'], 0, 3);
		}
		
		return $authors;
	}	
}
