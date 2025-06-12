<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInquiryModel extends Model
{
    use HasFactory;
     protected $connection = 'general_inquiry';
    protected $table = 'tickets';
    protected $fillable = ['ticket_type', 'subject', 'description'];
}
