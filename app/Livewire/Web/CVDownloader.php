<?php

namespace App\Livewire\Web;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CVDownloader extends Component
{
    public function download()
    {
        dd(43);
    }

    public function render()
    {
        return view('web::livewire.c-v-downloader');
    }

   
}
