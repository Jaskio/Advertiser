<?php

namespace App\Repositories\Advertisement;

interface IAdvertisement
{
    /**
     * Get advertisements
     *
     * @param  int $id for mass or specific selection
     * @return array                Array of selected advertisements
     */
    public function get($id = NULL);
}
