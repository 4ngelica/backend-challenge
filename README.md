

<h3 align="center">Backend Challenge</h3>

<p align="center">
   API baseada em uma simulação de carteira digital para realização de transações financeiras.
</p>


## :pushpin: Sobre
<p align="justify" id="#backend_challenge_about">
Esse projeto compreende um sistema de pagamentos entre usuários do tipo pessoa física (customer) e pessoa jurídica (seller). Cada usuário possui uma carteira que é criada no momento em que o usuário é registrado no banco. Além disso, é possível realizar transações desde que sejam atendidas as seguintes condições:

<ul>
 <li>É necessário checar o saldo da carteira para habilitar a transação;</li>
 <li>Uma vez validado o saldo, é necessário obter a confirmação de um serviço externo para aprovação da transação;</li>
 <li>Usuários do tipo customer podem realizar transferências para customers e sellers;</li>
 <li>Usuários do tipo seller não realizam transações;</li>
 <li>Transações podem ser revertidas para atender casos de inconsistência.</li>
</ul>
</p>

As três entidades relacionais definidas são Carteira (wallet), Usuário (users) e Transação (transactions). Usuário e carteira apresentam uma relação de 1:1 e usuário/transação apresentam uma relação de 1:n. Quando um novo registro de usuário é gerado, uma carteira é associada a esse usuário com um saldo inicial de 0.00, carregando como chave estrangeira a user_id.

![db](https://user-images.githubusercontent.com/47900225/127950677-11c60a43-ede7-4cbb-abb6-556213961f49.png)

## :pushpin: Próximos passos
<p align="justify" id="#backend_challenge_next">
<ul>
 <li>Implementação da função getUserType() no modelo User para definir que o tipo 1 está associado ao usuário seller e o tipo 2 está associado ao usuário customer. Essa função será utilizada para estruturar a requisição de transação, visto que sellers não podem realizar transferências.</li>
 <li>Implementação da função checkAuthorization() no modelo Transaction para consultar o serviço externo na requisição de transação.</li>
 <li>Estruturação das rotas store.transaction e delete.transaction;</li>
 <li>Refatoração de código;</li>
 <li>Testes;</li>

</ul>

## :pushpin: Configurações do sistema
<div id="#backend_challenge_setup">
<ul>
 <li>Laravel 8.48.1</li>
 <li>Composer 2.0.11</li>
 <li>Mysql</li>
</ul>
</div>

## :pushpin: Instalação
<p id="#backend_challenge_install">
Se você deseja reproduzir esse projeto, siga esses passos:

• faça o download dos arquivos ou o clone desse repositório: <br>

`git clone https://github.com/4ngelica/backend-challenge.git`

• Uma vez clonado, é necessário criar seu banco de dados e adicionar suas credenciais ao arquivo .env (acesse https://laravel.com/docs/8.x/database para saber mais):

   DB_CONNECTION=***
   DB_HOST=***
   DB_PORT=***
   DB_DATABASE=***
   DB_USERNAME=***
   DB_PASSWORD=***

•  Use o comandos <br>
   `composer install` <br>
   `php artisan migrate`<br>
   `php artisan jwt:secret`

• Feito!

## :pushpin: Documentação
<p align="justify" id="#backend_challenge_docs">Endpoints</p>
<div>
<ul>
   <li>POST: /login - Autenticação do usuário</li>
   Parâmetros: email, password;
   <li>GET: /user - Lista todos os usuários do sistema</li>
   <li>POST: /user - Cria um novo registro de usuário no banco</li>
   Parâmetros: name, identity, password, email, type
   <li>GET: /user/{id} - Mostra um usuário específico através da chave id</li>
   <li>GET: /wallet - Mostra a carteira de um usuário autenticado</li>
   <li>GET: /transaction - Lista todas as transações de um usuário autenticado</li>
   <li>GET: /transaction/{id} - Mostra uma transação específica de um usuário autenticado através da chave id</li>
   <li>POST: /transaction - Cria um registro de transação no banco</li>
   Parâmetros: value, payee_id
</ul>
<div>

## :pushpin: Referências
<div align="justify" id="#backend_challenge_refs">
<ul>
   <li>https://laravel.com/docs/8.x</li>
   <li>https://jwt-auth.readthedocs.io/en/docs/laravel-installation/</li>
   <li>https://learning.postman.com/docs/publishing-your-api/documenting-your-api/</li>
</ul>
</div>

<footer>
   <hr></hr>
<p align="center">
Made with :heart: by Angélica Batassim
</p>
</footer>
