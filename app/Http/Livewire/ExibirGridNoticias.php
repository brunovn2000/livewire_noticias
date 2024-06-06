<?php

namespace App\Http\Livewire;

use App\Models\Noticias;
use Livewire\Component;
use Livewire\WithPagination;

class ExibirGridNoticias extends Component
{

    use WithPagination;


    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $noticias = Noticias::where('titulo', 'like', '%'.$this->search.'%')->paginate(6);
        return view('livewire.exibir-grid-noticias', compact('noticias'));
    }
}



