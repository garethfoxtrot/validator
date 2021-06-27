<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueArticle extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'Takie zagadnienie już istnieje w bazie danych! Proszę poprawić lub zmienić tematykę. (Jedno Pole)';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    // Czy to nie jest potrzebne do wyrenderowania komunikatu w formularzu??? 
    // public function validatedBy()
    // {
    //     return 'validate_fields';
    // }
}
