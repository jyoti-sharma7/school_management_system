<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class SubjectModel extends Model
{
    use HasFactory;
    protected $table='subject';
    
    static public function getRecord(){
        $return = SubjectModel::select('subject.*','users.name as created_by_name')
        ->join('users','users.id','subject.created_by');
        if(!empty(Request::get('name'))){
            $return=$return->where('subject.name','like','%'.Request::get('name').'%');
        }
        $return=$return->orderBy('subject.id','desc')
        ->paginate(10);

        return  $return;
    }
    static public function getSingle($id){
        return self::find($id);

    }
    static public function getSubject(){
        $return = SubjectModel::select('subject.*')
        ->join('users','users.id','subject.created_by')
        ->where('subject.status','=',0)
        ->orderBy('subject.name','asc')
        ->get();

        return  $return;
    }
  
}
