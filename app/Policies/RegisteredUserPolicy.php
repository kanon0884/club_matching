<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegisteredUserPolicy
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
        // 登録者ユーザーのアクセス許可ロジック
        return $user->role === 'registered_user';
    }

}
