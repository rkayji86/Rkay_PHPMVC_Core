<?php

namespace app\models;

use rkay\rkaymvc\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your Email',
            'subject' => 'Enter your Subject',
            'body' => 'Body'
        ];
    }

    public function send()
    {
        return true;
    }
}