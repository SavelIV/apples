<?php

namespace backend\models;

use backend\models\query\AppleQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "apple".
 *
 * @property int $id
 * @property string $color
 * @property int $status 1 - on the tree; 2 - fallen/on the ground; 3 - rotten
 * @property int $size percentage(%)
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @property string|null $fallenAt
 */
class Apple extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apple';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'size'], 'integer'],
            [['createdAt', 'updatedAt', 'fallenAt'], 'safe'],
            [['color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Color',
            'status' => 'Status',
            'size' => 'Size, %',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'fallenAt' => 'Fallen At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AppleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AppleQuery(get_called_class());
    }
}
