<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $updated_at
 * @property float $price
 */

class Currency extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['code', 'name', 'updated_at', 'price'];
    protected $table = 'currencies';

}
