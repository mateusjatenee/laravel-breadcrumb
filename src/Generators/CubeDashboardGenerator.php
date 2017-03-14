<?php

namespace Mateusjatenee\Breadcumb\Generators;

use Mateusjatenee\Breadcumb\BreadcumbGenerator;
use Mateusjatenee\Breadcumb\Contracts\BreadcumbGeneratorContract;

class CubeDashboardGenerator extends BreadcumbGenerator implements BreadcumbGeneratorContract
{
    public function generate($value = null)
    {
        if (!is_null($value)) {
            $this->set($value);
        }

        $html = '<ol class="breadcrumb">{content}</ol>';

        $string = '';
        foreach ($this->items as $key => $item) {
            if ($key == $this->items->count() - 1) {
                $string .= '<li class="active"><span>' . $item . '</span></li>';
            } else {
                $string .= '<li><span>' . $item . '</span></li>';
            }
        }

        return str_replace('{content}', $string, $html);
    }
}
