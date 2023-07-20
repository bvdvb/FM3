<?php

namespace common\models;

use common\models\generated\Herstelling as GeneratedHerstelling;
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
class Herstelling extends GeneratedHerstelling
{
   
}
