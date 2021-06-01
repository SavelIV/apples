<?php

namespace backend\models;

use backend\models\query\AppleQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

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
    public const COLOR_GREEN = 1;
    public const COLOR_YELLOW = 2;
    public const COLOR_RED = 3;
    public const COLOR_ORANGE = 4;
    public const COLOR_GREENYELLOW = 5;

    public const STATUS_ON_THE_TREE = 1;
    public const STATUS_FALLEN = 2;
    public const STATUS_ROTTEN = 3;

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
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'createdAt',
                'updatedAtAttribute' => 'updatedAt',
                'value' => new Expression('NOW()'),
            ],
        ];
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

    /**
     * @return array
     */
    public static function getColorList(): array
    {
        return [
            self::COLOR_GREEN => 'green',
            self::COLOR_YELLOW => 'yellow',
            self::COLOR_RED => 'red',
            self::COLOR_ORANGE => 'orange',
            self::COLOR_GREENYELLOW => 'greenyellow',
        ];
    }

    /**
     * @return mixed|string
     * @throws \Exception
     */
    public static function getColor(): ?string
    {
        return array_rand(static::getColorList());
    }

    /**
     * @return string|null
     * @throws \Exception
     */
    public function getColorName(): ?string
    {
        return ArrayHelper::getValue(static::getColorList(), $this->color);
    }

    /**
     * @return array
     */
    public static function getStatusList(): array
    {
        return [
            self::STATUS_ON_THE_TREE => 'On the Tree',
            self::STATUS_FALLEN => 'Fallen/On the ground',
            self::STATUS_ROTTEN => 'Rotten',
        ];
    }

    /**
     * @return string|null
     * @throws \Exception
     */
    public function getStatusName(): ?string
    {
        return ArrayHelper::getValue(static::getStatusList(), $this->status);
    }

}
