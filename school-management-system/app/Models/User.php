<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'password' => 'hashed',
    ];
    static public function getAdmin(){
        $return = self::select('users.*')
        ->where('user_type','=',1);
        if(!empty(Request::get('name'))){
            $return=$return->where('name','like','%'.Request::get('name').'%');
        }
        if(!empty(Request::get('email'))){
            $return=$return->where('email','like','%'.Request::get('email').'%');
        }
       $return=$return->orderBy('id','desc')
        ->paginate(10);
        return  $return;

    }
static public function getSingle($id)
{
return self::find($id);
}
    static public function getEmailSingle($email){
        return User::where('email',"=",$email)->first();
    }
    static public function getTokenSingle($remember_token){
        return User::where('remember_token',"=",$remember_token)->first();
    }

    static public function getStudent(){
        $return = self::select('users.*','class.name as class_name')
        ->join('class','class.id','=','users.class_id','left')
        ->where('users.user_type','=',3);
        if(!empty(Request::get('name'))){
            $return=$return->where('users.name','like','%'.Request::get('name').'%');
        }
        if(!empty(Request::get('last_name'))){
            $return=$return->where('users.last_name','like','%'.Request::get('last_name').'%');
        } if(!empty(Request::get('email'))){
            $return=$return->where('users.email','like','%'.Request::get('email').'%');
        }
        if(!empty(Request::get('roll_number'))){
            $return=$return->where('users.roll_number','like','%'.Request::get('roll_number').'%');
        }
        if(!empty(Request::get('class'))){
            $return=$return->where('class.name','like','%'.Request::get('class').'%');
        }

       $return=$return->orderBy('users.id','desc')
        ->paginate(10);
        return  $return;

    }
    public function getProfile(){
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)){
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return "";
        }
    }
    static public function getParent(){
        $return = self::select('users.*')
        ->where('user_type','=',4);
        if(!empty(Request::get('name'))){
            $return=$return->where('name','like','%'.Request::get('name').'%');
        }
        if(!empty(Request::get('email'))){
            $return=$return->where('email','like','%'.Request::get('email').'%');
        }
        if(!empty(Request::get('last_name'))){
            $return=$return->where('users.last_name','like','%'.Request::get('last_name').'%');
        }
       $return=$return->orderBy('id','desc')
        ->paginate(10);
        return  $return;

    }
}
