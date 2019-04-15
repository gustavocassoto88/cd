<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 * @property Company $company
 */
class Employees extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['company_id', 'name', 'last_name', 'email', 'phone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Companies');
    }
}
