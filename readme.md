<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Projeto Prático de Laravel + Livewire + Tailwind

> Exemplo básico Laravel com Livewire criar um portal de noticias

## Baixar o projeto
Primeiro passo, clonar o projeto:
``` bash
# Clonar
git clone https://github.com/brunovn2000/livewire_noticias

# Acessar
cd livewire_noticias
```

## Configuração - Backend

``` bash
# Instalar dependências do projeto
composer install

# Configurar variáveis de ambiente
cp .env.example .env
php artisan key:generate

# Configuração do JWT
php artisan jwt:secret

# Criar migrations (tabelas e Seeders)
php artisan migrate --seed

# Criar link simbólico storage/app/public para public/storage/
php artisan storage:link

php artisan serve

acesse em http://localhost:8000/
```

## Login
Crie um usuario para visualizar as rotas do painel
```
email:    teste@teste.com
password: password
```
