<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingModel extends Model
{
    use HasFactory;
    protected $connection = 'billing';
    protected $table = 'tickets';
    protected $fillable = ['ticket_type', 'subject', 'description'];
}
