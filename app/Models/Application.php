<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'firstname', 'lastname', 'address', 'address_nb', 'city', 'zip', 'phone', 'email',
        'shop_id', 'img_receipt', 'product_1_id', 'img_ean_1', 'is_product_2', 'product_2_id',
        'img_ean_2', 'whence_id', 'where_other', 'type_shop_id', 'legal_1', 'legal_2', 'legal_3',
        'legal_4'];

    /**
     * @return BelongsTo
     */
    public function whence(): BelongsTo
    {
        return $this->belongsTo(Whence::class);
    }

    /**
     * @return BelongsTo
     */
    public function typeShop(): BelongsTo
    {
        return $this->belongsTo(TypeShop::class);
    }

    /**
     * @return BelongsTo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function productFirst()
    {
        return $this->belongsTo(Product::class, 'product_1_id', 'id');
    }

    public function productSecond()
    {
        return $this->belongsTo(Product::class, 'product_2_id', 'id');
    }

    /**
     * @param $query
     * @param $search
     * @param $searchable
     * @return mixed
     */
    public function scopeSearch($query, $search, $searchable): mixed
    {
        if ($search && $searchable) {
            $query->where(function ($query) use ($search, $searchable) {
                foreach ($searchable as $column) {
                    match ($column) {
                        'id', 'firstname', 'lastname',
                        'email', 'phone',
                        'address', 'address_nb',
                        'city', 'zip',
                        'created_at' => $query->orWhere($column, 'like', '%' . $search . '%'),
                        'shop.name' => $query->orWhereHas('shop', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        'type_shop.name' => $query->orWhereHas('typeShop', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        'whence.name' => $query->orWhereHas('whence', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        'product_first.name' => $query->orWhereHas('productFirst', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        'product_second.name' => $query->orWhereHas('productSecond', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        default => null,
                    };
                }
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeFilter($query, $filter): mixed
    {
        if ($filter) {
            $filters = json_decode($filter, true);

            foreach ($filters as $column => $value) {
                match ($column) {
                    'id', 'firstname', 'lastname',
                    'email', 'phone',
                    'address', 'address_nb',
                    'city', 'zip',
                    'created_at' => $query->where($column, 'like', '%' . $value . '%'),
                    'shop.name' => $query->orWhereHas('shop', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'type_shop.name' => $query->orWhereHas('typeShop', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'whence.name' => $query->orWhereHas('whence', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'product_first.name' => $query->orWhereHas('productFirst', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'product_second.name' => $query->orWhereHas('productSecond', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'legal_1', 'legal_2', 'legal_3', 'legal_4' => $query->where($column, '=', $value === 'TAK' ? 1 : 0),
                    default => null,
                };
            }
        }

        return $query;
    }

}
