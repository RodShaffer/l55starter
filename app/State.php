<?php

namespace CGBG;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

    /**
     * Fillable fields for a state.
     *
     * @var array
     */
    protected $fillable = [
        'abbreviation', 'name'
    ];

}