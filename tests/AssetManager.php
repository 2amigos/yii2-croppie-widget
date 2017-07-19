<?php

/*
 * This file is part of the 2amigos/yii2-croppie-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace tests;

/**
 * AssetManager
 */
class AssetManager extends \yii\web\AssetManager
{
    private $_hashes = [];
    private $_counter = 0;
    /**
     * @inheritdoc
     */
    public function hash($path)
    {
        if (!isset($this->_hashes[$path])) {
            $this->_hashes[$path] = $this->_counter++;
        }
        return $this->_hashes[$path];
    }
}
