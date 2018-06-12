<?php
/**
 * Created by PhpStorm.
 * User: oit8788
 * Date: 13.04.2018
 * Time: 13:00
 */

namespace App;


use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];
}