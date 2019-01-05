<?php

namespace kouosl\ziyaretcisayac\controllers\backend;

use Yii;
use kouosl\ziyaretcisayac\models\ziyaretcisayac;
use kouosl\ziyaretcisayac\models\ziyaretcisayacSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ziyaretcisayacController implements the CRUD actions for ziyaretcisayac model.
 */
class ziyaretcisayacController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all ziyaretcisayac models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ziyaretcisayacSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ziyaretcisayac model.
     * @param integer $IP
     * @return mixed
     */
    public function actionView($IP)
    {
        return $this->render('view', [
            'model' => $this->findModel($IP),
        ]);
    }

    /**
     * Creates a new ziyaretcisayac model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ziyaretcisayac();

		
		İf ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IP' => $model->IP]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ziyaretcisayac model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $IP
     * @return mixed
     */
    public function actionUpdate($IP)
    {
        $model = $this->findModel($IP);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IP' => $model->IP]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ziyaretcisayac model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $IP
     * @return mixed
     */
    public function actionDelete($IP)
    {
        $this->findModel($IP)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ziyaretcisayac model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $IP
     * @return ziyaretcisayac the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IP)
    {
        if (($model = ziyaretcisayac::findOne($IP)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
