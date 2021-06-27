<?php

namespace App\Validator;

use App\Repository\ArticleRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UniqueArticleValidator extends ConstraintValidator
{
    private $articleRep;
    
    public function __construct(ArticleRepository $articleRep)
    {
        $this->articleRep = $articleRep;
    }

    public function validate($object, Constraint $constraint)
    {
        $technology  = $object->getTechnology();
        $url_address = $object->getUrl();
        
        $find_duplicate = $this->articleRep->checkIfExists($technology, $url_address);

        if(!$find_duplicate)
        {
            return;
        }

        // TODO: implement the validation here
        $this->context->buildViolation($constraint->message)
            ->addViolation();
    }
}
