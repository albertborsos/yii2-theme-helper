<?php

namespace albertborsos\themehelper\inspinia\widgets;

use Yii;

use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class NavBar extends \yii\bootstrap\NavBar
{
    public $brandHtml = false;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        Widget::init();
        $this->clientOptions = false;
        Html::addCssClass($this->options, 'navbar');
        if ($this->options['class'] === 'navbar') {
            Html::addCssClass($this->options, 'navbar-default');
        }
        Html::addCssClass($this->brandOptions, 'navbar-brand');
        if (empty($this->options['role'])) {
            $this->options['role'] = 'navigation';
        }
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'nav');
        echo Html::beginTag($tag, $options);
        if ($this->renderInnerContainer) {
            if (!isset($this->innerContainerOptions['class'])) {
                Html::addCssClass($this->innerContainerOptions, 'container');
            }
            echo Html::beginTag('div', $this->innerContainerOptions);
        }
        echo Html::beginTag('div', ['class' => 'navbar-header']);
        if (!isset($this->containerOptions['id'])) {
            $this->containerOptions['id'] = "{$this->options['id']}-collapse";
        }
        //echo $this->renderToggleButton();
        if (is_array($this->brandHtml) && isset($this->brandHtml['before'])) {
            echo $this->brandHtml['before'];
        }
        if ($this->brandLabel !== false) {
            Html::addCssClass($this->brandOptions, 'navbar-brand');
            echo Html::a($this->brandLabel, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, $this->brandOptions);
        }
        if (is_array($this->brandHtml) && isset($this->brandHtml['after'])) {
            echo $this->brandHtml['after'];
        }
        echo Html::endTag('div');
        Html::addCssClass($this->containerOptions, 'collapse');
        Html::addCssClass($this->containerOptions, 'navbar-collapse');
        $options = $this->containerOptions;
        $tag = ArrayHelper::remove($options, 'tag', 'div');
        echo Html::beginTag($tag, $options);
    }
}
