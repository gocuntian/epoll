<?php

namespace app\controllers;

use app\models\QuestionAnswer;
use app\models\search\QuestionAnswerSearch;
use Yii;
use app\models\Question;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate($id_ank)
    {
        $model = new Question(['id_ank' => $id_ank]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', Yii::t('app', "Record was successfully created."));
            return $this->redirect(['update', 'id' => $model->id_q]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->q_type == $model::Q_TYPE_CLOSE) {
            $questionAnswerModel = new QuestionAnswer(['id_q' => $id]);
            $questionAnswerSearchModel = new QuestionAnswerSearch();
            $questionAnswerParams = Yii::$app->request->queryParams + ['QuestionAnswerSearch' => ['id_q' => $id]];
            $questionAnswerDataProvider = $questionAnswerSearchModel->search($questionAnswerParams);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', Yii::t('app', "Record was successfully updated."));
            return $this->redirect(['view', 'id' => $model->id_q]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'questionAnswerSearchModel' => isset($questionAnswerSearchModel) ? $questionAnswerSearchModel : null,
                'questionAnswerDataProvider' => isset($questionAnswerDataProvider) ? $questionAnswerDataProvider : null,
                'questionAnswerModel' => isset($questionAnswerModel) ? $questionAnswerModel : null,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['/questionnaire/view', 'id' => $model->id_ank]);
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
