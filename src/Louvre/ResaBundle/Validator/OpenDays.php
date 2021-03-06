<?php 

namespace Louvre\ResaBundle\Validator;

use Symfony\Component\Validator\Constraint;


/**
* @Annotation
*/
class OpenDays extends Constraint 
{
    public $outdated = "Vous avez reservé pour le %date%, vous ne pouvez pas commander un jour déjà passé !";
    
    public $closedDay = "Désolé, nous sommes fermé %date%";
    
    public $full = "Désolé les réservations du %date% sont complètes";
    
    public function validatedBy()
    {
        return 'louvre_resa_opendays';
    }
}