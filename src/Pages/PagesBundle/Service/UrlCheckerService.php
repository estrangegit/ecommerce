<?php
namespace Pages\PagesBundle\Service;

class UrlCheckerService
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
}