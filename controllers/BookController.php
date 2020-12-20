<?php

namespace app\controllers;

use yii\rest\ActiveController;

use app\models\Book;
use app\models\Author;
use Yii;

class BookController extends ActiveController
{
	public $modelClass = 'app\models\Book';
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index']);
		return $actions;
	}

	public function actionIndex(){
		$authorID = Yii::$app->request->get('author_id');
		if(is_numeric($authorID) and $authorID >= 0) {
			$books = Author::find()->where('id = :id', [':id' => $authorID])->one()->books;
		} else {
			$books = Book::find()->joinWith('author', true)->asArray()->All();
		}
		
		return $books;
	}		
}
