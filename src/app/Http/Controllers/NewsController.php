<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\NewsCategory;
use App\Util\Message;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

/**
 * お知らせ media library非使用ver
 * 主にwysiwygの動作確認用
 */
class NewsController extends Controller
{
    protected $blade = "/admin/news";
    protected $success = ["message" => Message::messages['success']];

    /**
     */
    public function index()
    {
        $news = News::create([
            'news_category_id' => 1,
            'title' => '',
            'body' => '',
            'path' => null,
            'published_at' => '2024-01-01'
        ]);

        $news->path = null;
        $news->save();


        $message = Session::get("message");
        $news = News::all();
        return view($this->blade . '/index', [
            "title" => "news validate pattern1", "url" => "/news1",
            "news" => $news,
            "open" => "news",
            "message" => $message
        ]);
    }

    /**
     */
    public function index1()
    {
        $message = Session::get("message");
        $categories = NewsCategory::all()->pluck('name', 'id')->toArray();
        return view($this->blade . '/news', [
            "title" => "news validate pattern1", "url" => "/news1",
            "open" => "news",
            "message" => $message,
            "check" => "空NG",
            "categories" => $categories,
            "news" => new News(),
        ]);
    }

    /**
     */
    public function index2()
    {
        $message = Session::get("message");
        $categories = NewsCategory::all()->pluck('name', 'id')->toArray();
        return view($this->blade . '/news', [
            "title" => "news validate pattern2", "url" => "/news2",
            "open" => "news",
            "message" => $message,
            "check" => "空NG",
            "categories" => $categories,
            "news" => new News(),
        ]);
    }

    /**
     */
    public function index3()
    {
        $message = Session::get("message");
        $categories = NewsCategory::all()->pluck('name', 'id')->toArray();
        return view($this->blade . '/news', [
            "title" => "news validate pattern3", "url" => "/news3",
            "open" => "news",
            "message" => $message,
            "check" => "空OK",
            "categories" => $categories,
            "news" => new News(),
        ]);
    }

    /**
     */
    public function index4()
    {
        $message = Session::get("message");
        return view($this->blade . '/news4', [
            "title" => "news(Quill)",
            "url" => "/news4",
            "open" => "news",
            "message" => $message
        ]);
    }

    /**
     */
    public function index5()
    {
        $message = Session::get("message");
        return view($this->blade . '/news5', [
            "title" => "news(CKEditor)",
            "url" => "/news5",
            "open" => "news",
            "message" => $message
        ]);
    }

    /**
     */
    public function index6()
    {
        $message = Session::get("message");
        return view($this->blade . '/news6', [
            "title" => "news(TinyMCE)",
            "url" => "/news6",
            "open" => "news",
            "message" => $message
        ]);
    }

    /**
     * validation pattern1
     * @param Request $request
     */
    public function store1(Request $request)
    {
        $request->validate([
            'title' => function (string $attribute, mixed $value, Closure $fail) {
                if ($value == "NG") {
                    $fail("ng word.");
                }
            },
            'body' => 'filled'
        ], [
            'title' => 'タイトルは必須です。'
        ]);

        if ($request->has('下書き')) {
            $request->merge(['status' => 0]);
        } else {
            $request->merge(['status' => 1]);
        }

        $this->storeCommon($request);
        return redirect("/news")->with($this->success);
    }

    /**
     * validation pattern2
     * @param Request $request
     */
    public function store2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'filled',
            'published_at' => ['date_format:Y-m-d'],
        ], [
            'body' => 'filled',
            'published_at' => '日付が不正です。'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->has('下書き')) {
            $request->merge(['status' => 0]);
        } else {
            $request->merge(['status' => 1]);
        }

        $this->storeCommon($request);
        return redirect("/news2")->with($this->success);
    }

    /**
     * validation pattern3
     * @param NewsRequest $request
     */
    public function store3(NewsRequest $request)
    {
        if ($request->has('下書き')) {
            $request->merge(['status' => 0]);
        } else {
            $request->merge(['status' => 1]);
        }

        $this->storeCommon($request);
        return redirect("/news3")->with($this->success);
    }

    /**
     * quill
     * @param NewsRequest $request
     */
    public function store4(NewsRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ], [
            'title' => 'タイトルは必須です。',
            'body' => '本文は必須です。',
        ]);

        $this->storeCommon($request);
        return redirect("/news4")->with($this->success);
    }

    /**
     * quill
     * @param NewsRequest $request
     */
    public function store5(NewsRequest $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ], [
            'title' => 'タイトルは必須です。',
            'body' => '本文は必須です。',
        ]);

        $this->storeCommon($request);
        return redirect("/news5")->with($this->success);
    }

    /**
     * 表示
     */
    public function show(int $id)
    {
        $news = News::findOrFail($id);
        return view($this->blade . "/show", [
            'news' => $news,
        ]);
    }

    /**
     */
    public function edit4(News $news)
    {
        $message = Session::get("message");
        $categories = NewsCategory::all()->pluck('name', 'id')->toArray();
        return view($this->blade . '/news4', [
            "title" => "news(Quill)",
            "url" => "/news4",
            "open" => "new4",
            "message" => $message,
            "news" => $news,
            "categories" => $categories,
        ]);
    }

    /**
     */
    public function edit5(News $news)
    {
        $message = Session::get("message");
        $categories = NewsCategory::all()->pluck('name', 'id')->toArray();
        return view($this->blade . '/news5', [
            "title" => "news(CKEditor)",
            "url" => "/news5",
            "open" => "new5",
            "message" => $message,
            "news" => $news,
            "categories" => $categories,
        ]);
    }

    /**
     */
    public function edit6(News $news)
    {
        $message = Session::get("message");
        $categories = NewsCategory::all()->pluck('name', 'id')->toArray();
        return view($this->blade . '/news6', [
            "title" => "news(TinyMCE)",
            "url" => "/news6",
            "open" => "news",
            "message" => $message,
            "news" => $news,
            "categories" => $categories,
        ]);
    }


    /**
     * 保存共通
     * @param Request $request
     * @return void
     */
    protected function storeCommon(Request $request)
    {
        $file = $request->file('img');
        if (!is_null($file)) {
            $result = Storage::disk('s3')->put('/news', $file);
        } else {
            $result = null;
        }

        News::create($request->all() + ['path' => $result]);
    }
}
