<?php

namespace Pages\PagesBundle\Validator\Constraints;


use Pages\PagesBundle\Service\UrlCheckerService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UrlCheckerValidator extends ConstraintValidator
{

    private $urlCheckerService;

    public function __construct(UrlCheckerService $urlCheckerService)
    {
        $this->urlCheckerService = $urlCheckerService;
    }

    public function validate($value, Constraint $constraint){

        if($this->urlCheckerService->findUrlsWithError($value)){
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}