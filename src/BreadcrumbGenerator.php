<?php

namespace Mateusjatenee\Breadcrumb;

use Illuminate\Support\Collection;
use Mateusjatenee\Breadcrumb\Breadcrumb;

class BreadcrumbGenerator
{
    protected $items;

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
