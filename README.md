# Athenas - CRUD Laravel + VueJS
Pacote responsável por ilustrar as operações CRUD em 2 tabelas distintas (Categorias e Pessoas)

## Instalação e configuração
Para realizar a instalação deste repositório, faça os seguintes passos em seu terminal:

Clone o repositório em uma pasta
```
git clone https://github.com/pedroroccon/athenas
```

Instale as dependência utilizando o Composer. Para facilitar, deixei uma instância do Composer dentro da pasta do projeto. Acesse a página root do projeto, e então execute:
```
php composer.phar install
```

Faça uma cópia do arquivo de configuração:
```
cp -R .env.example .env
```

Gere uma chave para a sua aplicação:
```
php artisan key:generate
```

Por padrão, nós utilizamos SQLite como base de dados.
Caso você deseje continuar utilizando o SQLite, não se esqueça de criar o arquivo em database/database.sqlite. Também são suportadas as bases de dados: **MySQL, PostgreSQL e Firebird**
```
touch database/database.sqlite
```
Em seu arquivo **.env**, não esqueça de configurar a base de dados
```
DB_CONNECTION=sqlite
```
Caso queira utilizar outra base de dados, você pode mudar as configurações do arquivo **.env**

Faça a migração das bases de dados
```
php artisan migrate
```

Não se esqueça de definir as permissões (caso necessário) nas pastas **/bootstrap, /storage, /database**.

## Utilizando o Firebird
Para utilizar o Firebird como base de dados padrão da sua aplicação, altere o seu arquivo .env para:
```
DB_CONNECTION=firebird
DB_HOST=127.0.0.1
DB_DATABASE=/caminho_para_a_base/database.fdb
DB_USERNAME=usuario
DB_PASSWORD=senha
```

## Seeders
Para gerar os seeders e popular a base de dados com algumas informações padrões, utilize o comando:
```
php artisan athenas:seed
```

## Iniciando a aplicação
Para iniciar a aplicação, utilize o comando
```
php artisan serve
```
Sua aplicação será iniciada em **localhost:8000**

### Testes automatizados
Para executar os testes automatizados do pacote Athenas, execute o seguinte comando:
```
php artisan test athenas
```

Para executar os testes automatizados de toda a aplicação, execute o comando abaixo:
```
php artisan test
```