<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SearchOnlyUserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function accessResource(User $user, Resource $resource)
    {
        // 検索専用ユーザーのアクセス許可ロジック
        return $user->role === 'search-only_user';
    }

}
