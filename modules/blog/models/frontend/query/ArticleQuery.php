<?php
namespace modules\blog\models\frontend\query;

use yii\db\ActiveQuery;

use modules\blog\models\frontend\Article;

class ArticleQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['{{%article}}.status' => Article::STATUS_ACTIVE]);
        return $this;
    }
	
    public function published()
    {
        return $this->active();
    }
	
}