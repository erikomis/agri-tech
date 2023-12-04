<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadAppApk extends Component
{

    public $appVersion = '1.0.0';

    public function downloadAppApk()
    {
        // $file = public_path('app.apk');

        // $headers = array(
        //     'Content-Type: application/apk',
        // );

        // return response()->download($file, 'app.apk', $headers);


        return response()->download(storage_path('app/apk/app.apk'));
    }
    public function render()
    {
        return view('livewire.download-app-apk');
    }
}
