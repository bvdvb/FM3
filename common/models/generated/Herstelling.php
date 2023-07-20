<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "herstelling".
 *
 * @property int $id
 * @property int $klantid
 * @property int|null $typeid
 * @property int|null $defectid
 * @property string|null $defectomschr
 * @property string|null $serienr
 * @property int|null $ophalen 0 - niet ophalen\n1 - wel ophalen
 * @property int|null $volnazicht 0 - geen volledig nazicht\n1 - wel volledig nazicht
 * @property int|null $reservetoestid
 * @property string|null $beschadigingomschr
 * @property int|null $eigentoest
 * @property int|null $prijsofferte 0 - geen prijsofferte maken\n1 - wel prijsofferte maken
 * @property string|null $voorschot
 * @property int|null $opverdieping 0 - op gelijkvloers\n1 - op verdieping
 * @property string|null $prijsofferteprijs Prijs van de prijsofferte
 * @property string|null $consultatieomschrijving
 * @property string|null $totaleprijs afrekenprijs
 * @property string|null $betaalwijze 0\n1\n2\n3\n4\n5\n6
 * @property string|null $ontvangen Bedrag dat men cash heeft ontvangen
 * @property string|null $inleveringsdatum
 * @property string|null $werkhuisdatum
 * @property string|null $levdat
 * @property string|null $garantietype
 * @property string|null $garantieinsertdate
 * @property string|null $garantieupdatetype
 * @property string|null $garantieupdatedate
 * @property string|null $garantieopmerkingen
 * @property string|null $garantiesendtolevdate
 * @property int|null $jongens_insertid
 * @property int|null $jongens_herstelid
 * @property int|null $jongensverzendupdate
 * @property int|null $jongensarterugupdate
 * @property int|null $jongensafhalenupdate
 * @property string|null $herstelopmerkingen
 * @property int|null $herstellingagendatype 0 --> herstelling 1 --> herstelling ter plaatse 2 --> levering
 * @property int|null $verdieping 0 -> gelijkvloers 1 -> op verdiep 
 * @property int|null $aantalpersonenlevering hoeveel personen zijn er nodig voor de herstelling/levering
 * @property string|null $herstellingbelangrijk
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property Agendauserkruis[] $agendauserkruis
 * @property Bestelling[] $bestellings
 * @property User $createdByUser
 * @property User $jongensHerstel
 * @property User $jongensInsert
 * @property User $jongensafhalenupdate0
 * @property User $jongensarterugupdate0
 * @property User $jongensverzendupdate0
 * @property Klant $klant
 * @property Log[] $logs
 * @property Reservetoestel $reservetoest
 * @property Kruistypemerktoestel $type
 * @property User $updatedByUser
 */
class Herstelling extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'herstelling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['klantid'], 'required'],
            [['klantid', 'typeid', 'defectid', 'ophalen', 'volnazicht', 'reservetoestid', 'eigentoest', 'prijsofferte', 'opverdieping', 'jongens_insertid', 'jongens_herstelid', 'jongensverzendupdate', 'jongensarterugupdate', 'jongensafhalenupdate', 'herstellingagendatype', 'verdieping', 'aantalpersonenlevering', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['defectomschr', 'beschadigingomschr', 'garantieopmerkingen', 'herstelopmerkingen', 'herstellingbelangrijk'], 'string'],
            [['inleveringsdatum', 'werkhuisdatum', 'levdat', 'garantieinsertdate', 'garantieupdatedate', 'garantiesendtolevdate', 'created_at', 'updated_at'], 'safe'],
            [['serienr', 'consultatieomschrijving'], 'string', 'max' => 255],
            [['voorschot'], 'string', 'max' => 100],
            [['prijsofferteprijs', 'totaleprijs', 'betaalwijze', 'ontvangen', 'garantietype', 'garantieupdatetype'], 'string', 'max' => 45],
            [['created_by_userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by_userid' => 'id']],
            [['klantid'], 'exist', 'skipOnError' => true, 'targetClass' => Klant::class, 'targetAttribute' => ['klantid' => 'klantid']],
            [['typeid'], 'exist', 'skipOnError' => true, 'targetClass' => Kruistypemerktoestel::class, 'targetAttribute' => ['typeid' => 'id']],
            [['reservetoestid'], 'exist', 'skipOnError' => true, 'targetClass' => Reservetoestel::class, 'targetAttribute' => ['reservetoestid' => 'id']],
            [['updated_by_userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by_userid' => 'id']],
            [['jongensafhalenupdate'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['jongensafhalenupdate' => 'id']],
            [['jongensarterugupdate'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['jongensarterugupdate' => 'id']],
            [['jongens_herstelid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['jongens_herstelid' => 'id']],
            [['jongens_insertid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['jongens_insertid' => 'id']],
            [['jongensverzendupdate'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['jongensverzendupdate' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'klantid' => 'Klantid',
            'typeid' => 'Typeid',
            'defectid' => 'Defectid',
            'defectomschr' => 'Defectomschr',
            'serienr' => 'Serienr',
            'ophalen' => 'Ophalen',
            'volnazicht' => 'Volnazicht',
            'reservetoestid' => 'Reservetoestid',
            'beschadigingomschr' => 'Beschadigingomschr',
            'eigentoest' => 'Eigentoest',
            'prijsofferte' => 'Prijsofferte',
            'voorschot' => 'Voorschot',
            'opverdieping' => 'Opverdieping',
            'prijsofferteprijs' => 'Prijsofferteprijs',
            'consultatieomschrijving' => 'Consultatieomschrijving',
            'totaleprijs' => 'Totaleprijs',
            'betaalwijze' => 'Betaalwijze',
            'ontvangen' => 'Ontvangen',
            'inleveringsdatum' => 'Inleveringsdatum',
            'werkhuisdatum' => 'Werkhuisdatum',
            'levdat' => 'Levdat',
            'garantietype' => 'Garantietype',
            'garantieinsertdate' => 'Garantieinsertdate',
            'garantieupdatetype' => 'Garantieupdatetype',
            'garantieupdatedate' => 'Garantieupdatedate',
            'garantieopmerkingen' => 'Garantieopmerkingen',
            'garantiesendtolevdate' => 'Garantiesendtolevdate',
            'jongens_insertid' => 'Jongens Insertid',
            'jongens_herstelid' => 'Jongens Herstelid',
            'jongensverzendupdate' => 'Jongensverzendupdate',
            'jongensarterugupdate' => 'Jongensarterugupdate',
            'jongensafhalenupdate' => 'Jongensafhalenupdate',
            'herstelopmerkingen' => 'Herstelopmerkingen',
            'herstellingagendatype' => 'Herstellingagendatype',
            'verdieping' => 'Verdieping',
            'aantalpersonenlevering' => 'Aantalpersonenlevering',
            'herstellingbelangrijk' => 'Herstellingbelangrijk',
            'created_by_userid' => 'Created By Userid',
            'created_at' => 'Created At',
            'updated_by_userid' => 'Updated By Userid',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Agendauserkruis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgendauserkruis()
    {
        return $this->hasMany(Agendauserkruis::class, ['herstelid' => 'id']);
    }

    /**
     * Gets query for [[Bestellings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBestellings()
    {
        return $this->hasMany(Bestelling::class, ['herstellingid' => 'id']);
    }

    /**
     * Gets query for [[CreatedByUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedByUser()
    {
        return $this->hasOne(User::class, ['id' => 'created_by_userid']);
    }

    /**
     * Gets query for [[JongensHerstel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJongensHerstel()
    {
        return $this->hasOne(User::class, ['id' => 'jongens_herstelid']);
    }

    /**
     * Gets query for [[JongensInsert]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJongensInsert()
    {
        return $this->hasOne(User::class, ['id' => 'jongens_insertid']);
    }

    /**
     * Gets query for [[Jongensafhalenupdate0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJongensafhalenupdate0()
    {
        return $this->hasOne(User::class, ['id' => 'jongensafhalenupdate']);
    }

    /**
     * Gets query for [[Jongensarterugupdate0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJongensarterugupdate0()
    {
        return $this->hasOne(User::class, ['id' => 'jongensarterugupdate']);
    }

    /**
     * Gets query for [[Jongensverzendupdate0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJongensverzendupdate0()
    {
        return $this->hasOne(User::class, ['id' => 'jongensverzendupdate']);
    }

    /**
     * Gets query for [[Klant]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKlant()
    {
        return $this->hasOne(Klant::class, ['klantid' => 'klantid']);
    }

    /**
     * Gets query for [[Logs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Log::class, ['geschiedenisherstelid' => 'id']);
    }

    /**
     * Gets query for [[Reservetoest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservetoest()
    {
        return $this->hasOne(Reservetoestel::class, ['id' => 'reservetoestid']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Kruistypemerktoestel::class, ['id' => 'typeid']);
    }

    /**
     * Gets query for [[UpdatedByUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedByUser()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by_userid']);
    }
}
