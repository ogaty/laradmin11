<?php

namespace App\Http\Controllers;

use App\Models\NewsMedia;
use App\Util\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * media library使用ver
 */
class NewsMediaController extends Controller
{
    protected $blade = "/admin/news";
    protected $success = ["message" => Message::messages['success']];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $message = Session::get("message");
        return view($this->blade . '/news-media', ["title" => "news with medialibrary", "url" => "/news1", "message" => $message]);
    }

    /**
     * @param int $id
     */
    public function media(int $id)
    {
        $newsMedia = NewsMedia::find($id)->getMedia();

        return view($this->blade . '/media', [
            'newsMedias' => $newsMedia,
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $newsMedia = NewsMedia::create($request->all());
        $newsMedia
            ->addMedia($request->file('img'))
            ->usingName('new name')
            ->usingFileName($request->file('img')->getClientOriginalName())
            ->toMediaCollection('default');

        return redirect("/news-media/medias/" . $newsMedia->id);
    }
}
