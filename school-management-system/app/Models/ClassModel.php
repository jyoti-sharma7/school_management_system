<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClassModel extends Model
{
    use HasFactory;

    protected $table='class';
    
    static public function getRecord(){
        $return = ClassModel::select('class.*','users.name as created_by_name')
        ->join('users','users.id','class.created_by');
        if(!empty(Request::get('name'))){
            $return=$return->where('class.name','like','%'.Request::get('name').'%');
        }
        $return=$return->orderBy('class.id','desc')
        ->paginate(10);

        return  $return;
    }
    static public function getSingle($id){
        return self::find($id);

    }
    static public function getClass(){
        $return = ClassModel::select('class.*')
        ->join('users','users.id','class.created_by')
        ->where('class.status','=',0)
       ->orderBy('class.name','asc')
        ->get();

        return  $return;
    }
}
