# Sobre
Sistema de entrada e acompanhamento de socioeducandos na Superintendência de Medida Socioeducativa - SUMESE, pertencente à Secretaria de Estado de Prevenção a Violência - SEPREV. O sistema será utilizado por servidores de diferentes áreas para realizar o cadastro, acompanhamento e avaliação de adolescentes em processo de ressocialização.

## 📖 Como usar
Siga estas etapas para começar a usar o projeto:
#### 1. Clone o Projeto
Para obter uma cópia do projeto em seu computador, execute o comando abaixo para clonar o repositório usando o Git:
```
git clone https://github.com/SEPREV-SUMESE/Gestao-SUMESE.git
```
> **Observação:** Caso não tenha o **[Git](https://git-scm.com/)**, instale-o.

#### 2. **Configure o arquivo `.env`**
Vá para a pasta do projeto, faça uma cópia do arquivo `.env.example`, renomeie o arquivo para `.env` e faça as devidas modificações para configurar o servidor.

Você pode usar o seguinte comando para fazer uma cópia do arquivo `.env.example`:
```
cd Gestao-SUMESE
cp .env.example .env
```
Em seguida, abra o arquivo `.env` com um editor de texto e faça as configurações necessárias, como definir variáveis de ambiente, configurar credenciais de banco de dados, etc.

#### 4. Instale as Dependências
Instale as dependências do projeto com o composer
```
composer install
```
> **Observação:** Caso não tenha o **[Composer](https://getcomposer.org/)**, instale-o.

#### 4. Crie a chave
Crie a chave no `.env` com o seguinte comando:
```
php artisan key:generate
```
> **Observação:** Caso não tenha o **[Composer](https://getcomposer.org/)**, instale-o.


#### 5. Rode as Migrations
Rode as migrations do projeto com as seeders (não é obrigado executar a seeder, caso não queira)
```
php artisan migrate --seed
```
#### 6. Inicie o Servidor
Inicio o servidor laravel

#### Desenvolvimento

```
php artisan serve
```
> **Observação:** Por padrão, o servidor é executado na URL **[localhost](http://127.0.0.1:8000)**.

#### Produção
Seguir as instruções do servidor usado para o sistema.
> **Observação:** É recomendado o uso do **[apache](https://httpd.apache.org/)** ou **[nginx](https://nginx.org/en/)**.

## 💻 Usuário do Sistema  
O sistema possui apenas um tipo de usuário (Padrão)

## 🚀 Funcionalidades do Sistema  

### 1. Sistema de Autenticação

- **Login**  
  Permite que o usuário acesse sua conta no sistema por meio de credenciais válidas.

- **Cadastro**  
  Permite que novos usuários criem uma conta no sistema fornecendo dados básicos.

- **Recuperação de Senha**  
  Permite que o usuário redefina sua senha em caso de esquecimento, geralmente via e-mail.

---

### 2. Gerenciamento de Usuários

- **Listar Usuários**  
  Exibe uma lista de todos os usuários registrados no sistema com filtros e paginação.

- **Editar Usuário**  
  Permite atualizar dados de usuários, como nome, e-mail ou permissões.

- **Remover Usuário**  
  Permite excluir usuários do sistema de forma permanente ou desativar temporariamente.

- **Exportar Usuários em CSV**  
  Permite exportar a lista de usuários em formato CSV para fins de backup ou análise externa.


## :computer: Tecnologias Utilizadas

### Back-end
- **[Laravel](https://laravel.com/)**
- **[PHP](https://www.php.net/)**
- **[MySQL](https://www.mysql.com/)**
  
### Front-end
- **[HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)**
- **[CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS)**
- **[JS](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)**
- **[Blade](https://laravel.com/docs/9.x/blade)**
- **[MDBootstrap](https://mdbootstrap.com/)**
