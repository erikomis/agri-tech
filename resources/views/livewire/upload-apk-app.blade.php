<div>
    {{-- The Master doesn't talk, he acts. --}}

        <form wire:submit.prevent="uploadApkApp" >
            <input type="file" wire:model="appApk" id="appApk" name="appApk">
            {{ $appApk }}
            <button type="submit" class="">Upload App Apk</button>
        </form>
</div>
