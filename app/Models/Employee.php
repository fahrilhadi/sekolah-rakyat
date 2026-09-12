<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSchool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use BelongsToSchool;
    use SoftDeletes;

    protected $fillable = [
        'school_id',
        'user_id',
        'employee_number',
        'full_name',
        'gender',
        'birth_place',
        'birth_date',
        'phone',
        'address',
        'photo_path',
        'employment_status',
        'joined_at',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'joined_at' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}