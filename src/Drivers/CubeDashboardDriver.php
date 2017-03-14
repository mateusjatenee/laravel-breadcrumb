<?php

namespace Mateusjatenee\Breadcrumb\Drivers;

use Mateusjatenee\Breadcrumb\BreadcrumbGenerator;
use Mateusjatenee\Breadcrumb\Contracts\BreadcrumbDriverContract;

class CubeDashboardDriver extends BreadcrumbGenerator implements BreadcrumbDriverContract
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
