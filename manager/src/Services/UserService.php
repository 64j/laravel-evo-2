<?php

declare(strict_types=1);

namespace Manager\Services;

use App\Models\Permissions;
use App\Models\User;
use App\Models\UserAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UserService
{
    /**
     * @return array
     */
    public function getAuthUser(): array
    {
        /** @var UserAttribute $attributes */
        $attributes = UserAttribute::query()
            ->whereHas('user', fn($query) => $query->whereKey(Auth::user()->getKey()))
            ->first();

        $attributes->username = $attributes->user->username;

        unset($attributes->user);

        return $attributes->setHidden([])->toArray();
    }

    /**
     * @return array
     */
    public function getAuthPermissions(): array
    {
        $role = (int) User::query()
            ->with('attributes')
            ->find(Auth::user()->getKey())
            ->attributes
            ->role;

        return array_map(
            function ($item) {
                $item['disabled'] = !$item['role_permissions'];
                unset($item['role_permissions']);

                return $item;
            },
            Permissions::query()
                ->select(['key', 'name', 'lang_key'])
                ->with(
                    'rolePermissions',
                    fn($query) => $query->select(['permission'])
                        ->where('role_id', $role)
                )
                ->get()
                ->each(
                    fn(Permissions $item) => $item->name =
                        Lang::has('global.' . $item->lang_key) ? Lang::get('global.' . $item->lang_key) : $item->name
                )
                ->keyBy('key')
                ->toArray()
        );
    }
}
