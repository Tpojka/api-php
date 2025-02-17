<?php

namespace App\Observers;

use App\User;
use Hash;
use Ramsey\Uuid\Uuid;

class UserObserver
{
    /**
     * Handle the user "creating" event.
     *
     * @param User $user
     * @return void
     * @throws \Exception
     */
    public function creating(User $user)
    {
        $user->password = Hash::make($user->password);
        $user->uuid4 = Uuid::uuid4()->toString();
    }

    /**
     * Handle the user "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the user "updating" event.
     *
     * @param User $user
     * @return void
     */
    public function updating(User $user)
    {
        if (empty($user->name)) {
            $user->name = '#' . mb_substr(md5($user->id), 0, 6);
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param User $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param User $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
