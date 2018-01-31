<?php

namespace Pages\PagesBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */

class UrlChecker extends Constraint
{
    public $message = "La page contient des liens non valides";
}