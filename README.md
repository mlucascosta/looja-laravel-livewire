# 🛍️ Looja Laravel Livewire

Este é um projeto de catálogo de produtos desenvolvido com **Laravel**, **Livewire** e **Docker (Laravel Sail)**. Ele implementa um sistema de busca com filtros combinados (nome, categoria e marca), persistência de filtros, paginação e testes automatizados.

---

## 🚀 Tecnologias Utilizadas

- [Laravel 10.x](https://laravel.com/)
- [Livewire 3.x](https://livewire.laravel.com/)
- [Docker](https://www.docker.com/) com Laravel Sail
- [MySQL 8.x](https://www.mysql.com/)
- [TailwindCSS](https://tailwindcss.com/) (opcional)
- [Pest PHP](https://pestphp.com/) para testes

---

## ⚙️ Pré-requisitos

- Docker instalado e funcionando ([instale aqui](https://docs.docker.com/get-docker/))
- PHP (opcional, apenas para rodar alguns comandos locais)

---

## 📦 Subindo o ambiente com Sail

Laravel Sail é um ambiente de desenvolvimento baseado em Docker para projetos Laravel.

1. **Clonar o repositório:**

```bash
git clone https://github.com/mlucascosta/looja-laravel-livewire.git
cd looja-laravel-livewire
```

2. **Instalar dependências:**

```bash
composer install
```

3. **Copiar o `.env` e gerar a key:**

```bash
cp .env.example .env
./vendor/bin/sail artisan key:generate
```

4. **Subir os containers Docker:**

```bash
./vendor/bin/sail up -d
```

> Isso iniciará os serviços do Laravel, MySQL, e outros definidos no `docker-compose.yml`.

---

## 🧪 Migrando e populando o banco de dados

Após o ambiente estar no ar:

```bash
./vendor/bin/sail artisan migrate --seed
```

> Isso criará as tabelas e populará o banco com dados de teste (via seeders e factories).

---

## 🔍 Funcionalidades do sistema

- Listagem de produtos com paginação
- Filtros combináveis por:
    - Nome
    - Múltiplas categorias
    - Múltiplas marcas
- Persistência dos filtros após refresh
- Botão para limpar filtros
- Componentes reativos com Livewire
- Testes de feature com Livewire

---

## 🧪 Executando os testes

```bash
./vendor/bin/sail test
```

Ou, se estiver usando Pest:

```bash
./vendor/bin/sail pest
```

---

## 📂 Estrutura de Diretórios

```
app/
├── Http/
│   ├── Livewire/
│   └── Controllers/
database/
├── migrations/
├── seeders/
├── factories/
resources/
├── views/
└── livewire/
```

---

## 🐳 Comandos úteis com Sail

| Ação                        | Comando                                        |
|-----------------------------|------------------------------------------------|
| Subir os containers         | `./vendor/bin/sail up -d`                      |
| Parar os containers         | `./vendor/bin/sail down`                       |
| Acessar o container         | `./vendor/bin/sail shell`                      |
| Executar artisan            | `./vendor/bin/sail artisan <comando>`          |
| Rodar migração + seed       | `./vendor/bin/sail artisan migrate --seed`     |
| Rodar testes                | `./vendor/bin/sail test`                       |
| Rodar comandos do Composer  | `./vendor/bin/sail composer require <pacote>`  |

---

## 📎 Observações

- Este projeto é apenas para fins de avaliação técnica.
- Sinta-se livre para adaptar e estender conforme necessário.

---
