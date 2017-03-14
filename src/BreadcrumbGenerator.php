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

    public function generate($value = null)
    {
        if (!is_null($value)) {
            $this->set($value);
        }

        $html = $this->getParentTags();

        $string = '';

        foreach ($this->items as $key => $item) {
            if ($key == $this->items->count() - 1) {
                $string .= str_replace('{item}', $item, $this->getLastItemTags());
            } else {
                $string .= str_replace('{item}', $item, $this->getItemTags());
            }
        }

        return str_replace('{content}', $string, $html);
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
