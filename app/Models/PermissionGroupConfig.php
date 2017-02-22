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
use Request;

class PermissionGroupConfig extends Model
{
	protected $table = 'permission_group_config';

    protected $primaryKey = 'id';
	protected $fillable = ['name','created_at', 'updated_at'];

	public function scopeLikeName($query, $name)
	{
	    return !empty($name) ? $query->where($this->table.'.name', 'like', "%{$name}%") : $query;
	}

	public function getGroupConfigList()
	{
		Request::flash();
		$field = Request::input('field', 'name');
		$value = Request::input('value');
		$orderBy = Request::input('orderBy', 'id');
		$sort = Request::input('sort', 'desc');
	
		$page = (int)Request::input('page', 1);
		$length = (int)Request::input('length', 10);
		$start = ($page - 1) * $length;
	
		$likeMethod = 'like'.ucfirst(camel_case($field));
	
		$groupConfigList = $this->$likeMethod($value)->orderBy($orderBy, $sort)->skip($start)->paginate($length);
	
		//print_r($permissions);
	
		return $groupConfigList;
	}
	public function getGroupConfigById($id) 
	{
		return $this->where('id',$id)->get();
	}
	
	public function getAll()
	{
		return $this->all();
	}
}