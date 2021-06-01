<?php

namespace backend\forms;

use yii\base\Model;

/**
 * This is the model class for generate Apple Models
 *
 * @property integer $appleQuantity
 */
class GenerateAppleTreeForm extends Model
{

    /**
     * @var integer
     */
    public $appleQuantity;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appleQuantity'], 'required'],
            [['appleQuantity'], 'integer', 'min' => 1, 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'appleQuantity' => 'How many apples on this tree do you wish? (min:1, max:50)'
        ];
    }
}
