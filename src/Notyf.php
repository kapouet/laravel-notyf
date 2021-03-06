<?php

namespace Kapouet\Notyf;

use Exception;
use Illuminate\Session\Store;
use Illuminate\Support\Str;

class Notyf
{
    protected Store $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function success(string $message): void
    {
        $this->message('success', $message);
    }

    public function error(string $message): void
    {
        $this->message('error', $message);
    }

    public function message(string $type, string $message): void
    {
        $messages = $this->session->get('notyf.messages', []);
        $messages[] = compact('type', 'message');

        $this->session->flash('notyf.messages', $messages);
    }

    public function mix(string $path): string
    {
        static $manifests = [];

        if (! Str::startsWith($path, '/')) {
            $path = "/{$path}";
        }

        $manifestPath = __DIR__ . '/../dist/mix-manifest.json';

        if (! isset($manifests[$manifestPath])) {
            if (! is_file($manifestPath)) {
                throw new Exception('The Notyf Mix manifest dost not exist.');
            }

            $manifests[$manifestPath] = json_decode(file_get_contents($manifestPath), true);
        }

        $manifest = $manifests[$manifestPath];

        if (! isset($manifest[$path])) {
            $exception = new Exception("Unable to locale Notyf Mix file: {$path}.");

            if (! app('config')->get('app.debug')) {
                report($exception);

                return "/notyf{$path}";
            }

            throw $exception;
        }

        return "/notyf{$manifest[$path]}";
    }
}
