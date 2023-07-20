<?php
namespace common\models;

use common\models\generated\Usergroep as GeneratedUsergroep;
use Yii;

/**
 * This is the model class for table "usergroep".
 *
 * @property int $idusergroep
 * @property string $usergroepnaam
 * @property int|null $usergroepvolgorde
 * @property int|null $created_by_userid
 * @property string|null $created_at
 * @property int|null $updated_by_userid
 * @property string|null $updated_at
 *
 * @property Usergroepuserkruis[] $usergroepuserkruis
 */
class Usergroep extends GeneratedUsergroep
{
   
}
