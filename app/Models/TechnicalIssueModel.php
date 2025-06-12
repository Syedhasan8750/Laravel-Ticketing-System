<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalIssueModel extends Model
{
    use HasFactory;
    protected $connection = 'technical_issues';
    protected $table = 'tickets';
    protected $fillable = ['ticket_type', 'subject', 'description'];
}
