<?php

namespace App\Models;

use App\Mail\NewCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

class Company extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($questionnaire) {
            Mail::to('admin@admin.com')->send(new NewCompany());
        });
    }
}
