<?php

namespace modules\blog;

/**
 * site module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace;

    /**
     * @var boolean.
     */
    public $isBackend;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->isBackend === true) {
            $this->controllerNamespace = 'modules\blog\controllers\backend';
            $this->setViewPath('@modules/blog/views/backend');
        } else {
            $this->controllerNamespace = 'modules\blog\controllers\frontend';
            $this->setViewPath('@modules/blog/views/frontend');
        }
    }
}
