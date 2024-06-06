<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticias;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ListNoticias extends Component
{
    use WithPagination;

    protected $listeners = ['carregarListaNoticias' => '$refresh'];

    public function mount()
    {
        $this->carregarListaNoticias();
    }

    public function render()
    {
        $user = Auth::user();
        $noticias = Noticias::where('user_id',$user->id)->paginate(6);
        return view('livewire.list-noticias', [
            'noticias' => $noticias,
        ]);
    }

    public function carregarListaNoticias()
    {
        $this->resetPage();
    }

    public function carregarNoticia($id)
    {
        $this->emit('carregarNoticia', $id);
    }

    public function excluirNoticia($id)
    {
        $noticia = Noticias::findOrFail($id);
        $noticia->delete();
        $this->carregarListaNoticias(); 
        $this->emit('apagarNoticia', $id);

    }
}
