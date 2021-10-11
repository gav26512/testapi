<?php

namespace api\modules\sed\forms;

use api\modules\sed\enums\StatusObjectMessageEnum;
use common\models\Obj;
use yii\base\Model;

/**
 * Class SetStatusObjectForm
 * @package api\modules\sed\forms
 */
class SetStatusObjectSignedAllForm extends Model
{
    /** @var int|null  */
    public ?int $objectId = null;
    /** @var string|null  */
    public ?string $datetime = null;
    /** @var int|null  */
    public ?int $levelMessage = null;

    /**
     * @return array|array[]
     */
    public function rules()
    {
        return [
            [['objectId', 'datetime', 'levelMessage'],
                'required',
                'message' => 'Переданы не все параметры',
            ],
            [['levelMessage'],
                'in',
                'range' => StatusObjectMessageEnum::getConstantsByName(),
                'message' => 'levelMessage должно принадлежать множеству '.
                    StatusObjectMessageEnum::getConstantsByName(),
            ],
            [['objectId'],
                'integer',
                'message' => 'objectId неправильный тип',
            ],
            [['objectId'],
                'exist',
                'targetClass' => Obj::class,
                'targetAttribute' => ['objectId' => 'objectid'],
                'message' => 'Указанный объект не существует',
            ],
            [['datetime'],
                'datetime',
                'format' => 'php:Y-m-d H:i:s',
                'message' => 'datetime неправильный тип/формат',
            ],
        ];
    }
}
