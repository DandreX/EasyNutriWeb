<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {

        $user = Users::model()->findByAttributes(
            array(),
            'username=:username',
            array(':username' => $this->username)
        );
        if ($user === NULL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            ChromePhp::log("user is null");
        } else{
            if (($this->calculateHash($this->password)) != $user->password) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
                ChromePhp::error("pass not match");
            } else {
                $this->username = $user->username;
                $this->setState('nome', $user->nome);
                $this->setState('userid', $user->id);
                $this->errorCode = self::ERROR_NONE;
            }
        }

        return !$this->errorCode;


    }

    function calculateHash($password)
    {
        return hash("sha256", $password);
    }
}