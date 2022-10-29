<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	use HasFactory;
	
	protected $table    = 'post_comments';
	protected $fillable = ['user_id', 'post_id', 'body', 'published'];
}