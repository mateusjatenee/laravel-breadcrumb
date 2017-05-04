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
        if ($value) {
            $this->set($value);
        }

        $html = $this->getParentTags();

        $string = $this->buildString();

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

    protected function buildString()
    {
        $string = '';

        foreach ($this->items as $key => $item) {
            $string .= str_replace('{item}', $item, $this->getTag($key, $this->items));
        }

        return $string;
    }

    protected function getTag(int $key, Collection $items)
    {
        return $key === ($items->count() - 1) ? $this->getLastItemTags() : $this->getItemTags();
    }
}
