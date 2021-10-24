<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
   use HasFactory;

   protected $fillable = [
      'tag',
      'balance',
      'pin',
   ];

   protected $hidden = [
      'pin',
   ];


   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function transactions()
   {
      return $this->hasMany(Transaction::class);
   }
}
