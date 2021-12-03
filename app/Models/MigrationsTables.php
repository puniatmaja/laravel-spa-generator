<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class MigrationsTables extends Model
{
    protected $table = 'migrations_table';
	protected $fillable = [
			'name',
    		'table'
	];
	use HasFactory;
}
