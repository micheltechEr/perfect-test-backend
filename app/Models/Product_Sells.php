<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Sells extends Model
{
    use HasFactory;
protected $fillable = [
    'client_name',
    'client_email',
    'client_cpf',
    'product_id',
    'sale_date',
    'quantity',
    'discount',
    'status',
    'total_price'
];
protected $table = 'product_sells';
public function product(){
    //Esta venda pertence à  um Produto
    return $this->belongsTo(Product::class);
}
}
