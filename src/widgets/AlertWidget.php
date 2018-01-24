<?php

namespace albertborsos\themehelper\widgets;

use rmrevin\yii\fontawesome\FA;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\Alert;
use yii\web\Application;

class AlertWidget extends Alert
{
    const TYPE_SUCCESS = 'success';
    const TYPE_DANGER  = 'danger';
    const TYPE_INFO    = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_ERROR   = self::TYPE_DANGER;

    public static function addSuccess($message)
    {
        self::addAlert(self::TYPE_SUCCESS, FA::icon(FA::_CHECK_CIRCLE_O) . ' ' . $message);
    }

    public static function addError($message)
    {
        static::addDanger($message);
    }

    public static function addDanger($message)
    {
        self::addAlert(self::TYPE_DANGER, FA::icon(FA::_TIMES_CIRCLE_O) . ' ' . $message);
    }

    public static function addInfo($message)
    {
        self::addAlert(self::TYPE_INFO, FA::icon(FA::_INFO_CIRCLE) . ' ' . $message);
    }

    public static function addWarning($message)
    {
        self::addAlert(self::TYPE_WARNING, FA::icon(FA::_EXCLAMATION_TRIANGLE) . ' ' . $message);
    }

    private static function addAlert($type, $message)
    {
        if (!Yii::$app instanceof Application) {
            return false;
        }

        return Yii::$app->session->addFlash($type, $message);
    }

    public static function showAlerts()
    {
        echo '<div class="flash-container">';
        $flashes = Yii::$app->session->getAllFlashes(true);
        foreach ($flashes as $class => $messages) {
            foreach ($messages as $message) {
                $message = is_array($message) ? ArrayHelper::getValue($message, 'title') : $message;
                echo Html::tag('div', $message, ['class' => 'alert alert-' . $class, 'role' => 'alert']);
            }
        }
        echo '</div>';
    }
}
