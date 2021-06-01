<?php

namespace backend\controllers;

use backend\forms\GenerateAppleTreeForm;
use Exception;
use Yii;
use backend\models\Apple;
use backend\models\search\AppleSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppleController implements the CRUD actions for Apple model.
 */
class AppleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Apple models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a bunch of new Apple models.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     * @throws Exception
     */
    public function actionGenerateAppleTree()
    {
        $form = new GenerateAppleTreeForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {

            for ($i = 0; $i < $form->appleQuantity; $i++) {
                $apple = new Apple();
                $apple->color = $apple->getColor();
                $apple->save();
            }
            Yii::$app->session->setFlash('success', 'New tree with ' . $form->appleQuantity . ' apples generated. Thank you.');

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $form
        ]);
    }

    /**
     * Deletes an existing Apple model.
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
     * Finds the Apple model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apple the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apple::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
