# Gerenciador de Mangás - CRUD com Laravel 10

Este projeto é uma aplicação web completa para o gerenciamento de coleções de mangás, desenvolvida como parte de um estudo aprofundado sobre o framework **Laravel**. O sistema implementa o padrão de arquitetura **MVC** (Model-View-Controller) e oferece uma interface moderna e responsiva para realizar todas as operações de **CRUD** (Criar, Ler, Atualizar e Deletar).

Além da interface web, o projeto conta com uma API RESTful totalmente documentada via **Swagger (OpenAPI)**.

## Demonstração

Confira o projeto em funcionamento e acompanhe o desenvolvimento passo a passo no YouTube:

[![Demonstração do Projeto no YouTube](https://img.youtube.com/vi/CtdyNPKYCNg/0.jpg)](https://www.youtube.com/watch?v=CtdyNPKYCNg)

> **Link direto:** https://www.youtube.com/watch?v=CtdyNPKYCNg

## Funcionalidades Principais

### Interface Web (Frontend)

* **Dashboard de Coleção:** Visualização em tabela de todos os mangás cadastrados, com indicadores visuais de status e progresso de leitura.
* **Cadastro Simplificado:** Formulário intuitivo para adicionar novos volumes à coleção.
* **Edição Completa:** Possibilidade de atualizar o nome, total de volumes, volumes lidos e o status de leitura.
* **Exclusão Segura:** Remoção de registros com confirmação de segurança.
* **Barra de Progresso:** Visualização gráfica da porcentagem de leitura de cada obra.
* **Tema Dark Mode:** Interface estilizada com Bootstrap 5 em modo escuro para melhor experiência visual.

### Backend & API

* **API RESTful:** Endpoints padronizados para todas as operações de gerenciamento.
* **Documentação Swagger:** Documentação interativa gerada automaticamente, permitindo testar os endpoints diretamente pelo navegador.
* **Validação de Dados:** Regras de validação robustas no lado do servidor (Server-Side Validation) para garantir a integridade dos dados.

## Stack Tecnológico

Este projeto foi construído utilizando as seguintes tecnologias e bibliotecas:

* **Linguagem:** PHP 8.1+
* **Framework:** Laravel 10.x
* **Banco de Dados:** MySQL 8.x
* **Frontend:** Blade Templates, Bootstrap 5, FontAwesome
* **Documentação de API:** L5-Swagger (OpenAPI 3.0)
* **Ambiente de Desenvolvimento:** Composer, Artisan CLI
