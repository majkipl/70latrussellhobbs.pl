<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class ProductUrl extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @param string $productCode
     * @return mixed
     */
    public static function getByProductCode(string $productCode): mixed
    {
        $cacheKey = (new self)->getTable() . '_' . $productCode;

        return Cache::remember($cacheKey, now()->addDay(1), function () use($productCode) {
            return self::with('product')
                ->whereHas('product', function ($query) use ($productCode) {
                    $query->where('code', '=', $productCode);
                })->pluck('url');
        });
    }
}
