<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $logo
 * @property string $website
 * @property string $created_at
 * @property string $updated_at
 * @property Employee[] $employees
 */
class Companies extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'logo', 'website', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employees');
    }
}
