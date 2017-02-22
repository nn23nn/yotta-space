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
use \Request;

class PermissionGroup extends Model
{
	protected $table = 'permission_group';
	protected $tableConfig = 'permission_group_config';
	protected $tablePermission = 'permissions';
    //protected $primaryKey = 'id';
	protected $fillable = ['group_id','permission_id'];
	public $timestamps = false;

	public function scopeLikeName($query, $name)
	{
		
		$fieldConfig = "{$this->tableConfig}.name as group_name";
		
		$filedGroup  = "{$this->table}.group_id  as group_id ,{$this->table}.permission_id as permission_id ";
		$fieldPermission = "
			{$this->tablePermission}.display_name,
			{$this->tablePermission}.created_at ,
			{$this->tablePermission}.updated_at
		";
	    return !empty($name) ? $query->where($this->tableConfig.'.name', 'like', "%{$name}%")
	    							 ->leftJoin($this->tableConfig,$this->table.'.group_id','=',$this->tableConfig.'.id') 
	    							 ->leftJoin($this->tablePermission,$this->tablePermission.'.id','=',$this->table.'.permission_id')
	    							 ->select(
	    							 		"{$this->tableConfig}.name as group_name",
	    							 		"{$this->table}.group_id  as group_id",
	    							 		"{$this->table}.permission_id as permission_id",
	    							 		"{$this->tablePermission}.display_name",
	    							 		"{$this->tablePermission}.created_at",
	    							 		"{$this->tablePermission}.updated_at"
	    							 		)
	    							 : 
	    							 $query->leftJoin($this->tableConfig,$this->table.'.group_id','=',$this->tableConfig.'.id')
	    								   ->leftJoin($this->tablePermission,$this->tablePermission.'.id','=',$this->table.'.permission_id')
	    								   ->select("{$this->tableConfig}.name as group_name",
	    							 		"{$this->table}.group_id",
	    							 		"{$this->table}.permission_id as permission_id",
	    							 		"{$this->tablePermission}.display_name",
	    							 		"{$this->tablePermission}.created_at",
	    							 		"{$this->tablePermission}.updated_at");
	}
	
	public function getPermissionListByGroupIds($groupIdsArray)
	{
		
		$permissions = $this
					->whereIn('group_id',$groupIdsArray)
					->leftJoin($this->tablePermission,$this->tablePermission.'.id','=',$this->table.'.permission_id')->orderBy('permission_id', 'desc')->get();
		
		//$permissions = $this->$likeMethod($value)->orderBy($orderBy, $sort)->skip($start)->paginate($length);
		
		return $permissions;
	}
	
	//删除对应关系：分组----->权限
	public function deleteGroup($groupIds=array())
	{
		return $this->whereIn('group_id', $groupIds)->delete();
	}
	public function deleteGroupByPermissionIds($permissionIdArray)
	{
		return $this->whereIn('permission_id', $permissionIdArray)->delete();
	}
	
	
	public function getGroup($groupIds=array())
	{
		return $this->whereIn('group_id', $groupIds)->get();
	}
	
	public function getGroupByPermissionId($permission_id)
	{
		return $this->where('permission_id',$permission_id)->first();
	}
}