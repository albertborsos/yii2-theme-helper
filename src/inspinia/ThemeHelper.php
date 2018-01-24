<?php

namespace albertborsos\themehelper\inspinia;

use Yii;
use yii\base\Model;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class ThemeHelper
{
    const MIDDLE_BAR_CONTENT = 'middle-bar-content';

    public static function setMiddleBarContent($content)
    {
        static::setParam(self::MIDDLE_BAR_CONTENT, $content);
    }

    public static function getMiddleBarContent()
    {
        return static::getParam(self::MIDDLE_BAR_CONTENT);
    }

    public static function setParam($key, $content)
    {
        Yii::$app->view->params[$key] = $content;
    }

    public static function getParam($key)
    {
        return ArrayHelper::getValue(Yii::$app->view->params, $key);
    }

    /**
     * @param $model Model
     * @return string
     */
    public static function errorSummary($model)
    {
        if (!$model->hasErrors()) {
            return;
        }

        return Html::tag('blockquote', Html::errorSummary($model), [
            'class' => 'alert-danger',
            'style' => 'font-size:14px;',
        ]);
    }
}
