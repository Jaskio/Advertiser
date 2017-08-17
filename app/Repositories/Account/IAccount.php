<?php

namespace App\Repositories\Account;

interface IAccount
{
    /**
     * Get either all non-deleted/active accounts (default behavior) or both non-deleted/active and deleted/in-active accounts
     * If $includeDeleted is set to true, deleted/in-active accounts will be returned
     * Used for employees get!
     *
     * @param  boolean $includeDeleted Whether to include deleted/in-active accounts or not
     * @return array                   Array of selected accounts
     */
    public function get($id = NULL);
}
