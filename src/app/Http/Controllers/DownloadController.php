<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

/**
 * csv/pdf/zipのダウンロード
 */
class DownloadController extends Controller
{
    public $blade = "/admin/download";

    public function index()
    {
        return response()->view($this->blade . '/index');
    }

    /**
     * Storageクラスを使える場合
     */
    public function downloadCsv()
    {
        return Storage::download('test.csv', 'test.csv', [['Content-Type' => 'text/csv']]);
    }

    /**
     * /tmpファイルとか
     */
    public function downloadCsv2()
    {
        return response()->download(storage_path('app/test.csv'));
    }

    /**
     * バイナリ変数から
     */
    public function downloadCsv3()
    {
        $content = file_get_contents(storage_path('app/test.csv'));
        $headers = [
            'Content-Type' => 'text/plain',
            'content-Disposition' => 'attachment; filename="test.csv"',
        ];
        return response()->make($content, 200, $headers);
    }

    /**
     * 自作
     */
    public function downloadCsv4()
    {
        $users = User::all();
        $csvHeader = ['id', 'name', 'email', 'created_at', 'updated_at'];
        $csvData = $users->toArray();

        return new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $csvHeader);

            foreach ($csvData as $row) {
                $csv = [$row['id'], $row['email'], $row['created_at']];
                fputcsv($handle, $csv);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ]);
    }

    /**
     * 他と何も変わらない
     */
    public function downloadZip()
    {
        return Storage::download('test.zip', 'test.zip', [['Content-Type' => 'application/zip']]);
    }

    /**
     * 他と何も変わらない
     */
    public function downloadPdf()
    {
        return Storage::download('test.pdf', 'test.pdf', [['Content-Type' => 'application/pdf']]);
    }
}
