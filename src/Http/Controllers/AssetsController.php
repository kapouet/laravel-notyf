<?php

namespace Kapouet\Notyf\Http\Controllers;

use Illuminate\Support\Str;

class AssetsController
{
    public function css(string $file)
    {
        if (Str::contains($file, 'map')) {
            return $this->pretendResponseIsFile(__DIR__ . "/../../../dist/css/{$file}", 'application/json');
        }

        return $this->pretendResponseIsFile(__DIR__ . "/../../../dist/css/{$file}", 'text/css');
    }

    public function js(string $file)
    {
        if (Str::contains($file, 'map')) {
            return $this->pretendResponseIsFile(__DIR__ . "/../../../dist/js/{$file}", 'application/json');
        }

        return $this->pretendResponseIsFile(__DIR__ . "/../../../dist/js/{$file}", 'application/javascript');
    }

    protected function pretendResponseIsFile(string $file, string $mimeType)
    {
        $expires = strtotime('+1 year');
        $lastModified = filemtime($file);
        $cacheControl = 'public, max-age=31536000';

        if ($this->matchesCache($lastModified)) {
            return response()->make('', 304, [
                'Expires' => $this->httpDate($expires),
                'Cache-Control' => $cacheControl,
            ]);
        }

        return response()->file($file, [
            'Content-Type' => "$mimeType; charset=utf-8",
            'Expires' => $this->httpDate($expires),
            'Cache-Control' => $cacheControl,
            'Last-Modified' => $this->httpDate($lastModified),
        ]);
    }

    protected function matchesCache(int $lastModified): bool
    {
        $ifModifiedSince = $_SERVER['HTTP_IF_MODIFIED_SINCE'] ?? '';

        return @strtotime($ifModifiedSince) === $lastModified;
    }

    protected function httpDate(int $timestamp): string
    {
        return sprintf('%s GMT', gmdate('D, d M Y H:i:s', $timestamp));
    }
}
