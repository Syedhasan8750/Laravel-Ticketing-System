<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    use HasFactory;
    protected $connection = 'feedback_db';
    protected $table = 'tickets';
    protected $fillable = ['ticket_type', 'subject', 'description'];
}
