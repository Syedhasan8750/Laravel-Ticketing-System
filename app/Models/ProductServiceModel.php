<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServiceModel extends Model
{
    use HasFactory;
    protected $connection = 'product_service';
    protected $table = 'tickets';
    protected $fillable = ['ticket_type', 'subject', 'description'];
}
