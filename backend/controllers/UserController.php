<?php

namespace backend\controllers;

use Yii;
use app\models\User;
use app\models\authitem;
use app\models\authassignment;
use backend\models\UserSearch;
use backend\models\authitemSearch;
use backend\models\authassignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$searchModel2 = new authitemSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        
		$searchModel3 = new authassignmentSearch();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);
		
		return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
			'searchModel3' => $searchModel3,
            'dataProvider3' => $dataProvider3,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

	public function actionView2($id)
    {
        return $this->render('view', [
            'model' => $this->findModel2($id),
        ]);
    }
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
	
	/*public function actionCreate2()
    {
        $model2 = new authitem();

        if ($model2->load(Yii::$app->request->post()) && $model2->save()) {
            return $this->redirect(['view', 'id' => $model2->name]);
        }

        return $this->render('create', [
            'model' => $model2,
        ]);
    }*/

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

	public function actionUpdate2($id)
    {
        $model2 = $this->findModel2($id);

        if ($model2->load(Yii::$app->request->post()) && $model2->save()) {
            return $this->redirect(['view', 'id' => $model2->id]);
        }

        return $this->render('update', [
            'model' => $model2,
        ]);
    }
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }
	
	protected function findModel2($id)
    {
        if (($model = authitem::findOne($id)) !== null) {
            return $model2;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }
	protected function findModel3($id)
    {
        if (($model = authassignment::findOne($id)) !== null) {
            return $model3;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }
}

