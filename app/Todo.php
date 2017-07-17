<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{

	use SoftDeletes;

    protected $table = 'todos';

    protected $fillable = [
    'user_id','todo','completed',
    ];

    protected $date = ['deleted_at'];

    public function users()

    {
    	return $this->belongsTo('App\Users');
    }

   /* public function getCompletedVal() 
    {
        return $this->completed;
    }*/

}
