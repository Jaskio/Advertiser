<?php

namespace App\Repositories\Account;

interface IAccount
{
    /**
     * Get accounts
     *
     * @param  int $id for mass or specific selection
     * @return array                   Array of selected accounts
     */
    public function get($id = NULL);
}
