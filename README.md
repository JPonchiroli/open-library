# Open Library

Um sistema de gerenciamento de biblioteca desenvolvido com Laravel (backend) e React (frontend) usando Inertia.js. Permite o gerenciamento de usuários, livros e empréstimos.

## Funcionalidades

- **Autenticação de Usuários**: Login e registro usando Laravel Fortify.
- **Gerenciamento de Livros**: Adicionar, editar e visualizar livros no catálogo.
- **Sistema de Empréstimos**: Registrar empréstimos de livros para usuários.
- **Interface Moderna**: Frontend em React com Material-UI e TailwindCSS.

## Requisitos

- PHP 8.3 ou superior
- Node.js 18+ e npm ou pnpm
- MySQL 8.0
- Docker (opcional, para execução em containers)

## Instalação

1. Clone o repositório:
   ```bash
   git clone <url-do-repositorio>
   cd open-library
   ```

2. Instale as dependências do PHP:
   ```bash
   composer install
   ```

3. Instale as dependências do JavaScript:
   ```bash
   npm install
   # ou
   pnpm install
   ```

4. Configure o ambiente:
   - Copie o arquivo `.env.example` para `.env`:
     ```bash
     cp .env.example .env
     ```
   - Configure as variáveis de ambiente no `.env`, especialmente a conexão com o banco de dados.

5. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

6. Execute as migrações do banco de dados:
   ```bash
   php artisan migrate
   ```

7. (Opcional) Popule o banco com dados de exemplo:
   ```bash
   php artisan db:seed
   ```

8. Construa os assets do frontend:
   ```bash
   npm run build
   # ou
   pnpm build
   ```

## Execução

### Desenvolvimento Local

1. Inicie o servidor Laravel:
   ```bash
   php artisan serve
   ```

2. Em outro terminal, inicie o servidor de desenvolvimento do frontend:
   ```bash
   npm run dev
   # ou
   pnpm dev
   ```

A aplicação estará disponível em `http://localhost:8000`.

### Usando Docker

Para executar a aplicação em containers Docker:

```bash
docker-compose up --build
```

Isso iniciará:
- A aplicação Laravel em `http://localhost:8000`
- O servidor de desenvolvimento do Vite em `http://localhost:5173`
- O banco MySQL em `localhost:3307`

## Scripts Disponíveis

- `npm run build`: Construir assets para produção
- `npm run dev`: Executar servidor de desenvolvimento
- `npm run lint`: Executar linter e corrigir problemas
- `npm run format`: Formatar código com Prettier
- `composer setup`: Script de configuração completa (instala dependências, configura .env, migrações, etc.)

## Estrutura do Projeto

- `app/`: Código do backend Laravel (Models, Controllers, Services, etc.)
- `resources/js/`: Código do frontend React
- `database/migrations/`: Migrações do banco de dados
- `routes/`: Definições de rotas