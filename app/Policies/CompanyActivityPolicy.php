<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\Company;
use App\Models\Activity;
use App\Models\User;

class CompanyActivityPolicy
{
    public function before(User $user): bool|null
    {
        if ($user->role_id === RolesEnum::ADMINISTRATOR->value) {
            return true;
        }

        return null;
    }

    public function viewAny(User $user, Company $company): bool
    {
        return $user->role_id === RolesEnum::COMPANY_OWNER->value && $user->company_id === $company->id;
    }

    public function create(User $user, Company $company): bool
    {
        return $user->role_id === RolesEnum::COMPANY_OWNER->value && $user->company_id === $company->id;
    }

    public function update(User $user, Activity $activity): bool
    {
        return $user->role_id === RolesEnum::COMPANY_OWNER->value && $user->company_id === $activity->company_id;
    }

    public function delete(User $user, Activity $activity): bool
    {
        return $user->role_id === RolesEnum::COMPANY_OWNER->value && $user->company_id === $activity->company_id;
    }
}
