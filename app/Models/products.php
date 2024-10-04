<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class products extends Model
{
    use HasFactory;
    //nama tabel
    protected $table = 'products';

    //field/kolom yang berada pada table products di database
    protected $fillabe = [
        'categories_id',
        'product',
        'description',
        'price',
        'stock',
        'image',
    ];

    public function products():BelongsTo

    {

        return $this->BelongsTo(products::class);

    }
}
