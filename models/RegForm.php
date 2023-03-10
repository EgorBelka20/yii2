<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property News[] $news
 */
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fio', 'login', 'email', 'password', 'passwordConfirm', 'agree'], 'required', 'message' => 'Поле обязательно для заполнения'],
            ['fio', 'match', 'pattern' => '/^[А-Яа-я\s\-]{5,}$/u', 'message' => 'Только кириллица, дефис и пробелы'],
            ['login', 'match', 'pattern' => '/^[A-Za-z]{1,}$/u', 'message' => 'Только латинкие буквы'],
            ['login', 'unique', 'message' => 'Такой логин уже есть'],
            ['email', 'email', 'message' => 'Некорректная почта'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'boolean'],
            [['id',], 'default', 'value' => null],
            [['id', 'admin'], 'integer'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
            'admin' => 'Admin',
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Согласие на обработку данных',
        ];
    }
}
