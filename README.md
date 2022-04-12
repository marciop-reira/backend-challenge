# Back-end Challenge 🏅 2021 - Space Flight News

## Tabela de Conteúdo

- [Tabela de Conteúdo](#tabela-de-conte%C3%BAdo)
- [Sobre o Projeto](#sobre-o-projeto)
    - [Tecnologias Utilizadas](#tecnologias-utilizadas)
    - [Atribuições](#atribuies)
    - [Link para o vídeo de apresentação](#link-para-o-vdeo-de-apresentao)
- [Setup Docker](#setup-docker)
    - [Passo a passo](#passo-a-passo)
- [Documentação da API](#documentao-da-api)
- [Licença](#licen%C3%A7a)
- [Contato](#contato)

## Sobre o Projeto

>  This is a challenge by [Coodesh](https://coodesh.com/)

Neste projeto viso mostrar as minhas habilidades como PHP/Laravel Back-end Developer.

### Tecnologias utilizadas
- [PHP/Laravel](https://laravel.com/docs/9.x)
- [MongoDB](https://www.mongodb.com/)
- [Redis](https://redis.io/)
- [Docker](https://www.docker.com/)
- [Swagger-PHP](https://zircote.github.io/swagger-php/)

### Atribuições
- Desenvolver API RESTfull com os endpoints:
    - `[GET]/: ` Retornar um Status: 200 e uma Mensagem "Back-end Challenge 2021 🏅 - Space Flight News"
    - `[GET]/articles/:`   Listar todos os artigos da base de dados, utilizar o sistema de paginação para não sobrecarregar a REQUEST
    - `[GET]/articles/{id}:` Obter a informação somente de um artigo
    - `[POST]/articles/:` Adicionar um novo artigo
    - `[PUT]/articles/{id}:` Atualizar um artigo baseado no `id`
    - `[DELETE]/articles/{id}:` Remover um artigo baseado no `id`
- Consumir API [Space Flight News](https://api.spaceflightnewsapi.net/v3/documentation) e popular base de dados da aplicação com todos os artigos da API
- Desenvolver CRON para ser executado diariamente às 9h e armazenar, na base de dados da aplicação, os novos artigos adicionados na API externa
- Configurar ambiente Docker
- Configurar sistema de alerta caso haja algum problema ao consumir a API externa
- Escrever Unit Tests

### Link para o vídeo de apresentação

[https://www.loom.com/embed/022b42a778244ccd9cfb8ea26c652a73](https://www.loom.com/embed/022b42a778244ccd9cfb8ea26c652a73)

## Setup Docker

### Passo a passo

Crie o arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Back-end Challenge"
APP_URL=http://localhost:8180

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=backend_challenge
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=host
MAIL_PORT=port
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=from_address
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Acesse o container
```sh
docker-compose exec laravel_8 bash
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Acesse o projeto
[http://localhost:8180](http://localhost:8180)

## Documentação da API

A documentação da API desenvolvida pode ser acessada em [http://localhost:8180/swagger/index.html](http://localhost:8180/swagger/index.html)

## Licença

Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.

## Contato

Márcio Pereira - [Github](https://github.com/marciop-reira) - **marciop.usa@gmail.com**
