<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laracasts\Presenter\PresentableTrait;
use App\Http\Presenters\UserPresenter;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, PresentableTrait;

    protected $presenter = UserPresenter::class;

    protected $fillable = [
        'name',
        'birthday',
        'address',
        'zipcode',
        'city',
        'state',
        'phone',
        'cellphone'
    ];

}
