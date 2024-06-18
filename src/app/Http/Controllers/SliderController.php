<?php

namespace App\Http\Controllers;

class SliderController extends Controller
{
    public $blade = "/admin/slider";

    public function splide()
    {
        return view($this->blade . '/splide', [

        ]);
    }

    public function swiper()
    {
        return view($this->blade . '/swiper', [

        ]);
    }

    public function glide()
    {
        return view($this->blade . '/glide', [

        ]);
    }
}
