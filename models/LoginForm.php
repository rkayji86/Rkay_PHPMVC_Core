<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $user = new User();
        $user = $user->findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError('email', "User does not exists with this email");
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', "Password is incorrect");
            return false;
        }

        return Application::$app->login($user);
    }
}