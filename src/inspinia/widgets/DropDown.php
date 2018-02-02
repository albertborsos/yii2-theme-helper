<?php

namespace albertborsos\themehelper\inspinia\widgets;

use yii\bootstrap\Html;

class DropDown extends \yii\bootstrap\Dropdown
{
    public function init()
    {
        parent::init();
        Html::removeCssClass($this->options, ['widget' => 'dropdown-menu']);
        Html::addCssClass($this->options, 'nav nav-second-level');
    }

    protected function renderItems($items, $options = [])
    {
        foreach ($items as $key => $item) {
            Html::addCssClass($item['submenuOptions'], 'nav nav-third-level');
            $items[$key] = $item;
        }
        return parent::renderItems($items, $options);
    }
}
