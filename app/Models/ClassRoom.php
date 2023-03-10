<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory, SoftDeletes;



    // data apa yg perlu diisi
    protected $fillable = [
        'name', 
        'teacher_id'];

    //Dalam DB nama table CLASS, bukan CLASSROOM
    protected $table = 'class';

    //one to many: ONE class has MANY students
    public function students()
    {
        //Student: nama MODEL
        return $this->hasMany(Student::class, 'class_id', 'id'); //'class_id','id': sebab nama MODEL != nama TABLE dlm DB
    }

    //one to one: ONE class has ONE teacher
    public function homeroomTeacher()
    {
        //Teacher: nama MODEL
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
