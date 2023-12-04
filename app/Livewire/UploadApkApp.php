<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadApkApp extends Component

{
    use WithFileUploads;
    public $appApk;

    public function uploadApkApp()
    {

        $this->validate([
            'appApk' => 'required|file|max:50000|mimes:apk'
        ]);
        $this->appApk->store('apk', 'public');
        session()->flash('message', 'App Apk successfully uploaded.');
    }
    public function render()
    {
        return view('livewire.upload-apk-app');
    }
}
