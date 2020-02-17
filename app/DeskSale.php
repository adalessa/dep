<?php

namespace App;

use Exception;
use Illuminate\Support\Collection;

class DeskSale
{
    protected Collection $items;
    protected bool $confirmed = false;

    public function __construct()
    {

        $this->items = new Collection();
    }

    public function addItem(Item $item)
    {
        throw_if($this->confirmed, new Exception('Can not add items to a sale confirmed'));

        $this->items->add($item);
    }

    public function items()
    {
        return $this->items->values();
    }

    public function confirm()
    {
        $this->confirmed = true;
    }

    public function total()
    {
        return $this->items->sum('price');
    }
}
