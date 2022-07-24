<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'code', 'collection_id'];

    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    /**
     * @return BelongsTo
     */
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    /**
     * @return mixed
     */
    public static function getAllCached(): mixed
    {
        $cacheKey = (new self)->getTable();

        return Cache::remember($cacheKey, now()->addDay(365), function () {
            return self::selectRaw("id, CONCAT(code, ' - ', name) AS name")->get();
        });
    }

    public static function getByCollection(string $slug)
    {
        $cacheKey = (new self)->getTable() . '-' . $slug;

        return Cache::remember($cacheKey, now()->addDay(1), function () use($slug) {
           return self::with('collection')
                    ->whereHas('collection', function ($query) use ($slug) {
                           $query->where('slug', '=', $slug);
                       })
                    ->get();
        });
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
                        'id', 'name', 'code',
                        'collection.name' => $query->orWhereHas('collection', function ($subQuery) use ($search) {
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
                    'id', 'name', 'code',
                    'collection.name' => $query->orWhereHas('collection', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    default => null,
                };
            }
        }

        return $query;
    }
}
