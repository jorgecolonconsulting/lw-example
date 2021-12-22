<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchItunes extends Component
{
    public $search = '';

    public function render()
    {
        $results = $this->searchItunes();

        return view('livewire.search-itunes', ['results' => $results]);
    }

    protected function searchItunes()
    {
        if ($this->search) {
            return Http::get('https://itunes.apple.com/search', [
                'term' => $this->search,
                'limit' => '10'
            ])->object()->results;
        } else {
            return [];
        }
    }
}
