<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;

    static $rules = [
        'email' => 'required',
        'title' => 'required',
        'description' => 'required',
        'answer',
        'status',
    ];
    protected $fillable = [
        'email',
        'title',
        'description',
        'answer',
        'status',
    ];

    /**
     * sets field statusBoolean to true if status is 'Visible'
     * false otherwise
     */
    public function loadStatusBooleanField() {
        $this->statusBoolean = $this->status == 'Visible';
    }

    static public function booleanToStatus($b) {
        return $b ? 'Visible' : 'Invisible';
    }
}
