<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Comment\Status;
class Comment extends Model
{
    public function evaluator() {
        return $this->belongsTo('App\Evaluator', 'evaluator_id', 'id')->select('id', 'first_name', 'family_name', 'belong', 'url');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }
    
    public function favorites() {
        return $this->hasMany('App\Favorite');
    }
}
