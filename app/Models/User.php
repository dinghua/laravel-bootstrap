<?php namespace Chitunet\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * 用户模型
 *
 * @author Alex
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;
    use EntrustUserTrait;

    protected $table = 'users';
    protected $fillable = [ 'email', 'name', 'password' ];
    protected $hidden = [ 'password', 'remember_token' ];

    public function profile($key = NULL)
    {
        if (!$key){
            return $this->profiles();
        }
        $filed = ProfileField::where('key', $key)->first();
        if (!$filed) return FALSE;
        $profile = Profile::where('user_id', $this->id)->where('field_id', $filed->id)->first();
        if (!$profile) return FALSE;

        return $profile->value;
    }

    public function profiles()
    {
        $result   = [ ];
        $profiles = Profile::where('user_id', $this->id)->get();
        foreach ($profiles as $profile)
        {
            $result[ $profile->field->key ] = $profile->value;
        }

        return $result;
    }
}