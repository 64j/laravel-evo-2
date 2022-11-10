<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property SiteTmplvar[]|Collection $tvs
 */
class Category extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $casts = [
        'rank' => 'int',
        'category' => 'string',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'category',
        'rank',
    ];

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function templatesNoCategory(): \Illuminate\Support\Collection
    {
        return \Illuminate\Support\Collection::make([
            'id' => 0,
            'name' => __('global.no_category'),
            'rank' => 0,
        ])
            ->merge(
                SiteTemplate::query()
                    ->select([
                        'id',
                        'templatename as name',
                        'templatealias as alias',
                        'description',
                        'locked',
                        'category',
                    ])
                    ->where('category', 0)
                    ->paginate()
            );
    }

    /**
     * @param array $ids
     * @param bool $not
     *
     * @return Category|null
     */
    public static function tvsNoCategory(array $ids = [], bool $not = false): ?Category
    {
        $items = SiteTmplvar::query()
            ->select([
                'id',
                'name',
                'description',
                'locked',
                'category',
            ])
            ->where(fn($item) => $ids ? ($not ? $item->whereKeyNot($ids) : $item->whereKey($ids)) : null)
            ->where('category', 0)
            ->get();

        return $items->count() ? (new static())->setRawAttributes([
            'id' => 0,
            'name' => __('global.no_category'),
            'rank' => 0,
            'items' => $items,
        ]) : null;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function chunksNoCategory(): \Illuminate\Support\Collection
    {
        return \Illuminate\Support\Collection::make([
            'id' => 0,
            'name' => __('global.no_category'),
            'rank' => 0,
        ])
            ->merge(
                SiteHtmlsnippet::query()
                    ->select([
                        'id',
                        'name',
                        'description',
                        'locked',
                        'disabled',
                        'category',
                    ])
                    ->where('category', 0)
                    ->paginate()
            );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function snippetsNoCategory(): \Illuminate\Support\Collection
    {
        return \Illuminate\Support\Collection::make([
            'id' => 0,
            'name' => __('global.no_category'),
            'rank' => 0,
        ])
            ->merge(
                SiteSnippet::query()
                    ->select([
                        'id',
                        'name',
                        'description',
                        'locked',
                        'disabled',
                        'category',
                    ])
                    ->where('category', 0)
                    ->paginate()
            );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function pluginsNoCategory(): \Illuminate\Support\Collection
    {
        return \Illuminate\Support\Collection::make([
            'id' => 0,
            'name' => __('global.no_category'),
            'rank' => 0,
        ])
            ->merge(
                SitePlugin::query()
                    ->select([
                        'id',
                        'name',
                        'description',
                        'locked',
                        'disabled',
                        'category',
                    ])
                    ->where('category', 0)
                    ->paginate()
            );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function modulesNoCategory(): \Illuminate\Support\Collection
    {
        return \Illuminate\Support\Collection::make([
            'id' => 0,
            'name' => __('global.no_category'),
            'rank' => 0,
        ])
            ->merge(
                SiteModule::query()
                    ->select([
                        'id',
                        'name',
                        'description',
                        'locked',
                        'disabled',
                        'category',
                    ])
                    ->where('category', 0)
                    ->paginate()
            );
    }

    /**
     * @return HasMany
     */
    public function templates(): HasMany
    {
        return $this->hasMany(SiteTemplate::class, 'category', 'id')
            ->select([
                'id',
                'templatename as name',
                'templatealias as alias',
                'description',
                'locked',
                'category',
            ])
            ->orderBy('templatename');
    }

    /**
     * @return HasMany
     */
    public function tvs(): HasMany
    {
        return $this->hasMany(SiteTmplvar::class, 'category', 'id')
            ->select([
                'id',
                'name',
                'caption',
                'description',
                'locked',
                'category',
            ])
            ->orderBy('name');
    }

    /**
     * @return HasMany
     */
    public function chunks(): HasMany
    {
        return $this->hasMany(SiteHtmlsnippet::class, 'category', 'id')
            ->select([
                'id',
                'name',
                'description',
                'locked',
                'disabled',
                'category',
            ])
            ->orderBy('name');
    }

    /**
     * @return HasMany
     */
    public function snippets(): HasMany
    {
        return $this->hasMany(SiteSnippet::class, 'category', 'id')
            ->select([
                'id',
                'name',
                'description',
                'locked',
                'disabled',
                'category',
            ])
            ->orderBy('name');
    }

    /**
     * @return HasMany
     */
    public function plugins(): HasMany
    {
        return $this->hasMany(SitePlugin::class, 'category', 'id')
            ->select([
                'id',
                'name',
                'description',
                'locked',
                'disabled',
                'category',
            ])
            ->orderBy('name');
    }

    /**
     * @return HasMany
     */
    public function modules(): HasMany
    {
        return $this->hasMany(SiteModule::class, 'category', 'id')
            ->select([
                'id',
                'name',
                'description',
                'locked',
                'disabled',
                'category',
            ])
            ->orderBy('name');
    }
}
