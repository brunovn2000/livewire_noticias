<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticias;
use Livewire\WithPagination;

class PainelAdmin extends Component
{

    use WithPagination;

    protected $listeners = ['carregarListaNoticias' => '$refresh'];
    public function render()
    {
        return view('livewire.painel-admin',[
            'noticias' => Noticias::paginate(6),
        ]);
    }



    public function carregarListaNoticias()
    {
        $this->resetPage();
        // $this->render();

    }

    public function carregarNoticia($id)
    {
        $this->emit('carregarNoticia', $id);
    }

    public function excluirNoticia($id)
    {
        $noticia = Noticias::findOrFail($id);
        $noticia->delete();
        // $this->resetPage();
        $this->carregarListaNoticias(); // Atualiza a lista de notícias após a exclusão
    }
}
