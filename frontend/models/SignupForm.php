<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
	/*public $id;*/
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			/*['id', 'trim'],*/
			
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Поле должно быть заполнено.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой пользователь уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Поле должно быть заполнено.'],
            ['email', 'email', 'message' => 'Введённое значение не является почтой.'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Данная почта уже зарегистрирована в системе.'],

            ['password', 'required', 'message' => 'Поле должно быть заполнено.'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();;
        
        return $user->save() ? $user : null;
		
    }
}
