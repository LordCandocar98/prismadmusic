<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\User;

/**
 * Class Role
 *
 * @property int $id
 * @property character varying $name
 * @property character varying $display_name
 * @property timestamp without time zone|null $created_at
 * @property timestamp without time zone|null $updated_at
 *
 * @property Collection|User[] $users
 * @property Collection|Permission[] $permissions
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	public $timestamps = false;


	protected $fillable = [
		'id',
		'name',
		'display_name'
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_roles');
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}
	
	protected static function boot()
    {
        parent::boot();
        if (Auth::check()){
            if (Auth::user()->role_id == 3) {
                static::addGlobalScope('roles', function (Builder $builder) {
                    $builder->where('id', '=', 2);
                });
            }
        }
    }
}
