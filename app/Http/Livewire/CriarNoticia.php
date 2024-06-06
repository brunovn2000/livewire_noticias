<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticias;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class CriarNoticia extends Component
{

    use WithFileUploads;
    public $titulo;
    public $descricao;
    public $imagem;
    public $noticiaId;
    public $imagemPreview;
    public $imagemNome;



    protected $rules = [
        'titulo' => 'required|min:3',
        'descricao' => 'required|max:500',
        'imagem' => 'required|image|max:4096',
    ];
    protected $listeners = ['carregarNoticia','apagarNoticia'];
    public function render()
    {
        return view('livewire.criar-noticia');
    }

    public function updatedImagem()
    {
        $this->imagemPreview = $this->imagem->temporaryUrl();
        $this->imagemNome = $this->imagem->getClientOriginalName();

    }

    public function carregarNoticia($id)
    {
        $noticia = Noticias::findOrFail($id);
        $this->noticiaId = $noticia->id;
        $this->titulo = $noticia->titulo;
        $this->descricao = $noticia->descricao;
        $this->imagemPreview = 'storage/'.$noticia->imagem; 
        $this->imagemNome = basename($noticia->imagem);

    }

    public function apagarNoticia($id)
    {

        if($id == $this->noticiaId){
            $this->limparCampos();

        }

    }

    
    public function criarNoticia()
    {
        $this->validate();
        $user =auth()->user();
        try {            
            $path = $this->imagem->store('noticias','public');
            if(!$path){
                $this->addError('imagem',' Não foi possivel fazer upload da imagem');
                return;
            } 

            Noticias::create([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'imagem' => $path,
                'user_id' => $user->id
            ]);

            $this->limparCampos();
            $this->carregarListaNoticias();

            session()->flash('sucess_create', 'Noticia criada com sucesso');
        } catch (\Throwable $th) {

            $this->addError('catch', $th->getMessage());

        }


    }


    public function atualizarNoticia(){

        if ($this->noticiaId) {
            $noticia = Noticias::findOrFail($this->noticiaId);
            $noticia->update([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
            ]);

            if ($this->imagem) {
                $path = $this->imagem->store('noticias','public');
                if (!$path) {
                    $this->addError('imagem', 'Não foi atualizar a fazer upload da imagem');
                    return;
                }
                $noticia->imagem = $path;
                $noticia->save();
            }
            $this->limparCampos();
            $this->carregarListaNoticias();

            session()->flash('sucess_create', 'Notícia atualizada com sucesso');
        }


    }
    public function salvarNoticia()
    {
        if ($this->noticiaId) {
            $this->atualizarNoticia(); 
        }else{
            $this->criarNoticia();
        }
    }
    public function limparCampos()
    {
        $this->reset(['titulo', 'descricao', 'imagem', 'imagemPreview','imagemNome', 'noticiaId']);
    }

    public function carregarListaNoticias()
    {
        $this->emit('carregarListaNoticias'); 
    }


}



