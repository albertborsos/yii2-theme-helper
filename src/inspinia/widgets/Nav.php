<?php

namespace albertborsos\themehelper\inspinia\widgets;

use yii\helpers\ArrayHelper;

class Nav extends \yii\bootstrap\Nav
{
    public $activateParents = true;

    public $dropDownOptions = [];

    public $dropDownCaret = '<span class="arrow fa fa-chevron-circle-left"></span>';

    public function renderItem($item)
    {
        $extraOptions = []; // ['options' => ['class' => 'nav-label']];
        return parent::renderItem(ArrayHelper::merge($item, $extraOptions));
    }

    /**
     * Renders the given items as a dropdown.
     * This method is called to create sub-menus.
     * @param array $items the given items. Please refer to [[Dropdown::items]] for the array structure.
     * @param array $parentItem the parent item information. Please refer to [[items]] for the structure of this array.
     * @return string the rendering result.
     * @since 2.0.1
     */
    protected function renderDropdown($items, $parentItem)
    {
        return DropDown::widget([
            'items' => $items,
            'encodeLabels' => $this->encodeLabels,
            'clientOptions' => false,
            'view' => $this->getView(),
            'options' => ArrayHelper::getValue($parentItem, 'dropDownOptions', []),
        ]);
    }
}
