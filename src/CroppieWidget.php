<?php

/*
 * This file is part of the 2amigos/yii2-croppie-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace dosamigos\croppie;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class CroppieWidget extends Widget
{
    /**
     * @var array the displayed tag option
     */
    public $options = [];
    /**
     * @var array the plugin options
     * @see http://foliotek.github.io/Croppie/
     */
    public $clientOptions = [];
    /**
     * @var array the plugin events.
     * @see http://foliotek.github.io/Croppie/
     */
    public $clientEvents = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::tag('div', '', $this->options);

        $this->registerClientScript();
    }

    /**
     * Registers required script for the plugin to work
     */
    public function registerClientScript()
    {
        $view = $this->getView();

        CroppieAsset::register($view);

        if (isset($this->clientOptions['enableExif']) && $this->clientOptions['enableExif'] === true) {
            ExifJsAsset::register($view);
        }

        $options = !empty($this->clientOptions)
            ? Json::encode($this->clientOptions)
            : '';

        $id = $this->getId();

        $js[] = ";jQuery('#$id').croppie($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#$id').on('$event', $handler);";
            }
        }

        $view->registerJs(implode("\n", $js));
    }
}
