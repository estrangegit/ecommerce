<?php

namespace Pages\PagesBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UrlCheckerValidator extends ConstraintValidator
{

    public function curUrl($site){
        $ch = curl_init($site);

        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);

        curl_exec($ch) ? $curl=true : $curl=false;

        curl_close($ch);

        return $curl;
    }

    public function findUrlsWithError($value){
        $violation = false;
        $urls = preg_match_all('/<a href="(.*)">/', $value, $url);

        foreach (array_unique($url[1]) as $site){
            if($this->curUrl($site)===false){
                $violation = true;
            }
        }

        return $violation;
    }

    public function validate($value, Constraint $constraint){

        if($this->findUrlsWithError($value)){
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}