<?php

namespace App\Http\Controllers;

use App\Http\Requests\DigitalOceanStoreRequest;
use App\Services\CdnService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DoSpacesController extends Controller
{
    private $cdnService;

    public function __construct(CdnService $var) {
      $this->cdnService = $var;
    }

          /**
     * Gives the test file in do spaces
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
      $contents = Storage::disk('digitalocean')->get('test.txt');
      return response()->json(['msg' => $contents]);
    }

              /**
     * Gives the test file in do spaces
     *
     * @return \Illuminate\Http\Response
     */
    public function test2()
    {
      $contents = Storage::disk('digitalocean')->get('test2.txt');
      return response()->json(['msg' => $contents]);
    }

    public function store(DigitalOceanStoreRequest $request)
    {
      $file = $request->file('doctorProfileImageFile');
      $fileName = (string) Str::uuid();
      $folder = config('filesystems.disks.digitalocean.folder');
  
      Storage::disk('digitalocean')->put(
          "{$folder}/{$fileName}",
          file_get_contents($file)
      );
  
      return response()->json(['message' => 'File uploaded'], 200);
    }
}
