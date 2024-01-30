<?php

namespace App\Livewire\Web;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Component;

class LangSelector extends Component
{
    public array $langs;

    public string $lang;

    public function mount(Request $request)
    {
        $this->langs = config('langs.available-langs');
        $this->lang = $request->session()->get('lang', app()->getLocale());
    }

    public function updatedLang(Request $request)
    {
        $this->validate([
            'lang' => Rule::in(array_keys(config('langs.available-langs')))
        ]);

        $request->session()->put('lang', $this->lang);

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('web::livewire.lang-selector');
    }

   
}
