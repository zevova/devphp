<?php
namespace modules\blog\models\frontend\query;

use yii\db\ActiveQuery;

use modules\blog\models\frontend\Category;

class CategoryQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => Category::STATUS_ACTIVE]);
        return $this;
    }
	
    /**
     * @return $this
     */
    public function noParents()
    {
        $this->andWhere('{{%category}}.parent_id IS NULL');
        return $this;
    }
	
    /**
     * [published description]
     * @return [type] [description]
     */
    public function published()
    {
        return $this->active();
    }
}