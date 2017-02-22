<?php 

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class RoleUser extends Model
{
	protected $table = 'role_user';
	protected $fillable = ['user_id', 'role_id'];
	protected $primaryKey = 'user_id';
	public $timestamps = false;
	
	public function getRoleUserList($roleId)
	{
	
		return $this->where('role_user.role_id',$roleId)->leftJoin('users','users.id','=','role_user.user_id')->get();
	}
	public function destoryUser($roleId,$userIds)
	{
		
		return $this->whereIn('user_id', $userIds)->where('role_id', $roleId)->delete();
	}
}