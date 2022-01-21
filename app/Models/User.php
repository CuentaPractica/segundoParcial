<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    protected $table='users';
    protected $fillable = [
        'email',
        'password',
        'idPersona',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personas()
    {
        return $this->belongsTo(Persona::class, 'idPersona');
    }

    public function countPage($id){
        $page = Page::findOrFail($id);
        $page->count = $page->count +1;
        $page->save();
    }

    public function showCounter($id){
        $page = Page::findOrFail($id);
        return $page->cu." || Numero de visitas: ".$page->count;
    }
    public function total(){
        $total = DB::table('pages')
                ->sum('count');
        return "Numero total de visitas en el sitio : ".$total;
    }
    public function getStatsPages(){
        $array = [];
        for($i=1; $i <= 8;$i++){
            $page = Page::findOrFail($i);
            array_push($array,$page->count);
        }
       return json_encode($array);
    }
}
