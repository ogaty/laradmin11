<?php

namespace App\Http\Controllers;

use App\Models\Color;

class PaginationController
{
    public $blade = "/admin/paginate";

    /**
     * 1 2 3 4 5 6 7 8 9 10 11 12
     */
    public function type1()
    {
        $colors = Color::paginate(15);

        return view($this->blade . '/type1', [
            'colors' => $colors,
        ]);
    }

    /**
     * 1 2  7  11 12
     */
    public function type2()
    {
        $colors = Color::simplePaginate(15)->withQueryString();

        return view($this->blade . '/type2', [
            'colors' => $colors,
        ]);
    }
}
