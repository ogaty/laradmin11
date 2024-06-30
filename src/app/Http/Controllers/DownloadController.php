<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use League\Csv\Writer;
use ZipArchive;

/**
 * csv/pdf/zipのダウンロード
 */
class DownloadController extends Controller
{
    public $blade = "/admin/download";

    public function index()
    {
        return view($this->blade . '/index');
    }

    /**
     * Storageクラスを使える場合
     */
    public function downloadCsv()
    {
        return Storage::download('public/test.csv', 'test.csv', [['Content-Type' => 'text/csv']]);
    }

    /**
     * Laravel外
     */
    public function downloadCsv2()
    {
        return response()->download(storage_path('app/public/test.csv'));
    }

    /**
     * バイナリ変数から
     */
    public function downloadCsv3()
    {
        $content = file_get_contents(storage_path('app/public/test.csv'));
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
     * league/csv
     */
    public function downloadCsv5()
    {
        $csv = Writer::createFromString();

        $header = ['id', 'name', 'email'];
        $csv->insertOne($header);

        $records = [
            ['1', 'test1', 'test1@example.com'],
            ['2', 'test2', 'test2@example.com'],
            ['3', 'test3', 'test3@example.com'],
        ];
        $csv->insertAll($records);

        return response($csv->toString())->withHeaders([
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="csv_5.csv"'
        ]); //returns the CSV document as a string
    }

    /**
     * 他と何も変わらない
     */
    public function downloadZip()
    {
        return Storage::download('public/test.zip', 'test.zip', [['Content-Type' => 'application/zip']]);
    }

    /**
     * 自作zip
     */
    public function downloadZip2()
    {
        umask(0);
        $randomString = Str::random(5);
        $zipDir = '/tmp/zip2/' . $randomString;
        @mkdir($zipDir, 0777, true);

        file_put_contents($zipDir . '/' . 'test.pdf', file_get_contents(storage_path('app/public/test.pdf')));

        $zip = new ZipArchive();
        $zipfile = $zipDir . '/download.zip';
        if (file_exists($zipfile)) {
            unlink($zipfile);
        }

        $zip->open($zipfile, ZipArchive::CREATE);
        $zip->addFile($zipDir . '/' . 'test.pdf', 'zip/test.pdf');
        $zip->close();

        return response()->file($zipfile, [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'attachment; filename="zip5.zip"'
        ]);
    }

    /**
     * 他と何も変わらない
     */
    public function downloadPdf()
    {
        return Storage::download('public/test.pdf', 'test.pdf', [['Content-Type' => 'application/pdf']]);
    }

    /**
     * ブラウザで開く
     */
    public function downloadPdf2()
    {
        return Storage::response('public/test.pdf', 'test.pdf', [['Content-Type' => 'application/pdf']]);
    }
}
