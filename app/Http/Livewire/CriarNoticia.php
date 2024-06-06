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
    public $noticiaId; // Adicionado campo para armazenar o ID da notícia a ser editada
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
        // $this->imagem = $noticia->imagem; // Não carregar a imagem existente
        $this->imagemPreview = 'storage/'.$noticia->imagem; 
        $this->imagemNome = basename($noticia->imagem);
        // Caminho da imagem existente

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
            // dd($this->imagem);
            $nameFile = strval(Carbon::now()->timestamp)."." . $this->imagem->getClientOriginalExtension();
            
            $path = $this->imagem->store('noticias','public');
            if(!$path){
                $this->addError('imagem',' Não foi possivel fazer upload da imagem');
                return;

            } 

        $noticia = Noticias::create([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'imagem' => $path,
            'user_id' => $user->id
        ]);

        // $this->titulo = $this->descricao = $this->imagem = null;
        $this->limparCampos();
        $this->carregarListaNoticias();


        session()->flash('sucess_create', 'Noticia criada com sucesso');
            //code...
        } catch (\Throwable $th) {
            $this->addError('catch', $th->getMessage());
            throw $th;

        }


    }


    public function atualizarNoticia(){

        // $this->carregarNoticia();
        if ($this->noticiaId) {
            // Atualiza a notícia existente
            $noticia = Noticias::findOrFail($this->noticiaId);
            $noticia->update([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
            ]);

            if ($this->imagem) {
                // $nameFile = strval(Carbon::now()->timestamp) . "." . $this->imagem->getClientOriginalExtension();
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

        }
        session()->flash('sucess_create', 'Notícia atualizada com sucesso');


    }
    public function salvarNoticia()
    {
        if ($this->noticiaId) {
            $this->atualizarNoticia(); // Chama o método criarNoticia para tratar a criação ou atualização
        }else{
            $this->criarNoticia(); // Chama o método criarNoticia para tratar a criação ou atualização
        }
    }
    public function limparCampos()
    {
        // $this->titulo = $this->descricao = $this->imagem = $this->noticiaId = null;
        $this->reset(['titulo', 'descricao', 'imagem', 'imagemPreview','imagemNome', 'noticiaId']);

    }

    public function carregarListaNoticias()
    {
        $this->emit('carregarListaNoticias'); // Emitir evento com o ID da notícia
    }


}



