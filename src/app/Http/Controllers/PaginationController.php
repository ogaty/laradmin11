<?php

namespace App\Http\Controllers;

use App\Models\Color;

class PaginationController
{
    public $blade = "/admin/paginate";

    /**
     * 1 2 7 11 12
     */
    public function type1()
    {
        $colors = Color::paginate(15)->withQueryString();

        return view($this->blade . '/type1', [
            'colors' => $colors,
        ]);
    }

    /**
     * prev next
     */
    public function type2()
    {
        $colors = Color::simplePaginate(15)->withQueryString();

        return view($this->blade . '/type2', [
            'colors' => $colors,
        ]);
    }
}
