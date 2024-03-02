<?php

namespace app\models;
use app\repository\UserRepository;

class RegistrationForm extends \yii\base\Model
{
    public $email;
    public $password;
    public $passwordRepeat;
    public $last_name;
    public $first_name;
    public $patronimic;



    public function rules()
    {
        return [
          [['email','last_name','first_name','password','passwordRepeat'] , 'required',],
          ['passwordRepeat','compare','compareAttribute' => 'password'],
          ['patronimic','string'],
          ['email','email'],
          ['email','validateEmail']
        ];
    }

    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = UserRepository::getUserByEmail($this -> email);

            if ($user) {
                $this->addError($attribute, 'Пользователь существувет');
            }
        }
    }

}