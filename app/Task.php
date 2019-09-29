<?php

namespace App;

use App\Http\Traits\TimestampsTraite;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use TimestampsTraite;

    protected $table = 'tasks';
}
