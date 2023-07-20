<?php
namespace common\models;

use common\models\generated\Usergroepuserkruis as GeneratedUsergroepuserkruis;
use Yii;

/**
 * This is the model class for table "usergroepuserkruis".
 *
 * @property int $idusergroepuserkruis
 * @property int $usergroepuseruserid
 * @property int $usergroepusergroepid
 * @property int|null $created_by_userid
 * @property string|null $created_at
 * @property int|null $updated_by_userid
 * @property string|null $updated_at
 *
 * @property Usergroep $usergroepusergroep
 * @property User $usergroepuseruser
 */
class Usergroepuserkruis extends GeneratedUsergroepuserkruis
{
}
