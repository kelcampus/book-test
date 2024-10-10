# Spassu Livros

## Requisitos de Sistema

- PHP 8.3
- NGINX 1.27
- NVM v0.39.7
- Nodejs v20.14.0
- MariaDB 11.4 
- Laravel 11 com Vite e Blade

## Ambiente de Desenvolvimento com Docker

Usar esse ambiente não é obrigatório para executar o projeto, desde que o ambiente siga os Requisitos de Sistema descritos na sessão anterior.

Para instalação e configuração do ambiente de desenvolvimento siga os passos do link abaixo:

https://github.com/kelcampus/laravel-docker-development-environment

Após a instalação, clone o [repositório do projeto](https://github.com/kelcampus/spassu-livros) dentro da pasta app conforme orientado no link acima.

Acesse o container do php. Conforme o mapeamento de volume, você estará na raiz do projeto no laravel. É ai que os comandos do artisan serão executados.

## Configurando o .env da alicação

Configure o .env criando uma cópia do .env.example.

Configure o APP_URL.

    APP_URL=http://[localhost ou IP]:[PORT]

Altere o idioma:

    APP_LOCALE=pt_BR

Para configurar o banco de dados, mantenha a seguinte estrutura:

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE= // conforme configuração
    DB_USERNAME= // conforme configuração
    DB_PASSWORD= // conforme configuração

Instale o composer: 

    composer update

Instale as migrações:

    php artisan migrate

Gere uma nova chave de aplicação:
    
    php artisan key:generate

Instale o npm:

    npm update

Inicialize o Vite 

    npm run dev 

Caso o vite não funcione corretamente, ou seja, se o projeto não carregar os estilos por exemplo, veja a sessão **Considerações Vite com Docker**.

Até esse ponto, estando tudo configurado corretamente, o projeto deve estar rodando no browse conforme configurado no [ambiente de desenvolvimento](https://github.com/kelcampus/laravel-docker-development-environment).

Exemplos:

    http://localhost:[PORT] OU http://[IP]:[PORT]

## Usando a aplicação 

Ao acessar a aplicação, você será redirecionado para a tela de login.
Primeiro registre um usuário.

Após fazer o login o sistema está pronto para ser usado.

## Testes automatizados

Para rodar os testes automatizados execute o comando:

    php artisan test --parallel

Para acessar o relatório de cobertura de testes, acesse */reports/html-coverage/index.html*

    http://[localhost ou IP]:[port]/reports/html-coverage/index.html

## Seeder - Gerar dados de teste

Para gerar dados de teste execute o comando abaixo:

    php artisan db:seed --class="\App\Domains\Books\Database\Seeders\DatabaseSeeder"

## Considerações Vite com Docker 

Se o vite não funcionar corretamente, revise se a porta do Vite configurada no [ambiente de desenvolvimento](https://github.com/kelcampus/laravel-docker-development-environment) é a mesma no projeto, se não for, tente inicializar o vite passando a mesma porta configurada:

    npm run dev --port [PORT]

Você pode optar também por deixar igual em ambos os arquivos. Caso optar por modificar a porta no [ambiente de desenvolvimento](https://github.com/kelcampus/laravel-docker-development-environment), recrie-o após a mudança.    

Se ainda não funcionar, revise também o parâmetro host, case esteja rodando a aplicação com o IP local da máquina ao invés de localhost. Nesse caso, tente alterar o host para o IP conforme informado abaixo:

**Fonte: vite.config.js**

    import { defineConfig } from 'vite';
    import laravel from 'laravel-vite-plugin';

    export default defineConfig({
        server: { 
            host: true,
            hmr: {
                host: 'localhost' // ou IP local da máquina
            },
            port: 5174 // deve ser a mesma porta configurada no container do php
        },
        plugins: [
            laravel({
                input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                ],
                refresh: true,
            }),
        ],
    });
