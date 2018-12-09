<?php

namespace GDPR\Resource\Privacy;


use GDPR\Resource\IResultIntegrator;

class LanguageIntegrator implements IResultIntegrator
{

    public function integrate(&$record)
    {
        if(isset($record['privacy']['language'])) {
            $record['language'] =  $record['privacy']['language'];
        } else if(isset($record['form']['newsletter[language]'] )) {
            $record['language'] = $record['form']['newsletter[language]'];
        } else if(isset($record['form']['enquiry[enquiry_guest_language]'] )) {
            $record['language'] = $record['form']['enquiry[enquiry_guest_language]'];
        } else if(isset($record['form']['enquiry[enquiry_newsletter_language]'] )) {
            $record['language'] = $record['form']['enquiry[enquiry_newsletter_language]'];
        } else if(isset($record['form']['reservation_guest_language'] )) {
            $record['language'] = $record['form']['reservation_guest_language'];
        }else {
            $record['language'] =  'it';
        }
        $record['language'] =  strtolower($record['language'] );

        return $record;
    }
}