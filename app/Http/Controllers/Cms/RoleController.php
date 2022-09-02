<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function generate_role()
    {
    	$role = Role::create(['name' => 'Teacher']);
    	$role = Role::create(['name' => 'Chairman']);
    	$role = Role::create(['name' => 'Administration']);

    	return true;
    }
}
