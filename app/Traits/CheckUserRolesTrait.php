<?php

namespace App\Traits;

use App\Enums\Roles;
use App\Models\Post;

trait CheckUserRolesTrait
{
    /**
     * @return bool
     */
    public function isManager(): bool
    {
        return $this->role->name === Roles::MANAGER;
    }

    /**
     * @return bool
     */
    public function isEmployee(): bool
    {
        return $this->role->name === Roles::EMPLOYEE;
    }

    /**
     * @param Post $post
     * @return bool
     */
    public function isAuthor(Post $post): bool
    {
        return $this->isEmployee() && $this->id === $post->user_id;
    }

    /**
     * @param Post $post
     * @return bool
     */
    public function hasAuthor(Post $post): bool
    {
        return $this->isManager()
            && $this->employees()
                ->where('employee_id', $post->user_id)
                ->exists();
    }
}
