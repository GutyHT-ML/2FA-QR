<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DoCdnService implements CdnService 
{
  public function purge($fileName)
  {
    $folder = config('filesystems.digitalocean.folder');
    Http::asJson()->delete(
      config('filesystems.digitalocean.cdn_endpoint' . '/cache', 
      [
        'files' => ["{$folder}/{$fileName}"]
      ]
      )
    );
  }
}