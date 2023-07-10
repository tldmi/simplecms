<?php

namespace common\models;
use Illuminate\Database\Eloquent\Model;

class User extends Model {

	public static function isAuthorized() {
		if(!empty($_SESSION["user_id"])) {
			return (bool) $_SESSION["user_id"];
		}
		return false;
	}

    public static function logout()  {
        if (!empty($_SESSION["user_id"])) {
            unset($_SESSION["user_id"]);
        }
    }

    public static function saveSession($user_id, $remember = false, $http_only = true, $days = 7) {
    	$_SESSION["user_id"] = $user_id;

    	if($remember) {
    		$sid = session_id();

    		$expire = time() + $days * 24 * 3600;
    		$domain = "";
    		$secure = false;
    		$path = "/";

    		$cookie = setcookie("sid", $sid, $expire, $path, $domain, $secure, $http_only);
    	}
    }

    public static function passwordHash($password, $salt = NULL, $iterations = 10) {
        $salt = $salt ? $salt : uniqid();
        $hash = md5(md5($password . md5(sha1($salt))));

        for ($i = 0; $i < $iterations; ++$i) {
            $hash = md5(md5(sha1($hash)));
        }

        return array('hash' => $hash, 'salt' => $salt);
    }

	public static function authorize($username, $password, $remember=false) {

		$user = self::where('username','=',$username)->get()->first();

        if (!$user) {
            return false;
        }

		$hash = self::passwordHash($password,$user->salt)['hash'];

		if(!($user->password == $hash)) return false;
		else {
            self::saveSession($user->id, $remember);
            return true;		
		}

	}

}










