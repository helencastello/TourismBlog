<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $primaryKey = 'id';

    public function User(){
        return $this->hasOne(User::class);
    }

    public function Category(){
        return $this->hasOne(Category::class);
    }
}
