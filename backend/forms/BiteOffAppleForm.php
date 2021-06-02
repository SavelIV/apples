<?php

namespace backend\forms;

use yii\base\Model;

/**
 * This is the model class for setting percent of bitten Apple
 *
 * @property integer $percent
 */
class BiteOffAppleForm extends Model
{

    /**
     * @var integer
     */
    public $percent;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['percent'], 'required'],
            [['percent'], 'integer', 'min' => 1, 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'percent' => 'What percentage of this Apple do you want to bite off? (min:1, max:100)'
        ];
    }
}
