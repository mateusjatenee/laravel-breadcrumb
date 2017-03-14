<?php

namespace Mateusjatenee\Breadcumb;

use Illuminate\Support\Collection;
use Mateusjatenee\Breadcumb\Breadcumb;

class BreadcumbGenerator
{
    protected $items;

    protected $breadcumb;

    public function __construct(Breadcumb $breadcumb)
    {
        $this->breadcumb = $breadcumb;
    }

    public function set(string $key, $value = null)
    {
        $this->items = (new Collection(explode('.', $key)))->map(function ($word) {
            return $this->parseWord($word);
        });

        return $this;
    }

    public function toArray()
    {
        return $this->items->toArray();
    }

    protected function parseWord($word)
    {
        $words = explode('_', $word);

        $string = '';

        foreach ($words as $key => $word) {
            $string .= $key > 0 ? ' ' . ucfirst($word) : ucfirst($word);
        }

        return $string;
    }
}
