<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'firstname', 'lastname', 'address', 'address_nb', 'city', 'zip', 'phone', 'email',
        'shop_id', 'img_receipt', 'product_1_id', 'img_ean_1', 'is_product_2', 'product_2_id',
        'img_ean_2', 'whence_id', 'where_other', 'type_shop_id', 'legal_1', 'legal_2', 'legal_3',
        'legal_4'];

}
