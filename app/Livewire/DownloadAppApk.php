<?php

namespace App\Livewire;

use Livewire\Component;

class DownloadAppApk extends Component
{


    public function downloadAppApk()
    {

        return response()->download(storage_path('app/apk/app.apk'));
    }
    public function render()
    {
        return view('livewire.download-app-apk');
    }
}
