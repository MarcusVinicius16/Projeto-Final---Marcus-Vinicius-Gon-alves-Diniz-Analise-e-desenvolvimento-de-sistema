<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>README - Sistema de Gerenciamento de Inscrições e Atletas</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="container">
        <header class="header">
            <h1>Sistema de Gerenciamento de Inscrições e Atletas (CRUD)</h1>
        </header>
        <section class="section">
            <h2 class="section-title">🌟 Visão Geral do Sistema</h2>
            <p>
                O sistema é projetado para centralizar e organizar as informações dos atletas de uma prova de corrida, utilizando as operações básicas de <strong>CRUD</strong> (<strong>C</strong>reate, <strong>R</strong>ead, <strong>U</strong>pdate, <strong>D</strong>elete - Criar, Ler, Atualizar, Excluir). A principal funcionalidade é o <strong>upload inicial de planilhas CSV</strong>, seguido pela <strong>pesquisa e complementação dos dados</strong> de cada atleta no banco.
            </p>
        </section>
        <section class="section">
            <h2 class="section-title">⚙️ Funcionalidades Principais (CRUD)</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Operação</th>
                            <th>Funcionalidade no Sistema</th>
                            <th>Módulo de Uso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>CREATE (Criar)</strong></td>
                            <td><strong>Upload da Planilha CSV</strong> (Cria registros em massa) e <strong>Registro de novos dados</strong> (Staff/Admin) ou <strong>Criação de Contas</strong> (Admin).</td>
                            <td>Admin / Staff</td>
                        </tr>
                        <tr>
                            <td><strong>READ (Ler)</strong></td>
                            <td><strong>Pesquisa de Atletas</strong> por nome ou número de inscrição e <strong>Visualização</strong> da lista completa de inscritos.</td>
                            <td>Admin / Staff</td>
                        </tr>
                        <tr>
                            <td><strong>UPDATE (Atualizar)</strong></td>
                            <td><strong>Edição/Complementação dos dados</strong> do atleta pesquisado (ex: informações de contato, categoria, etc.).</td>
                            <td>Admin / Staff</td>
                        </tr>
                        <tr>
                            <td><strong>DELETE (Excluir)</strong></td>
                            <td><strong>Remoção de registros</strong> de atletas (ex: em caso de desistência ou erro de inscrição).</td>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="section">
            <h2 class="section-title">👤 Perfis de Usuário</h2>
            <p>O sistema possui duas áreas de acesso distintas, cada uma com níveis de permissão específicos:</p>
            <div class="card-group">
                <div class="card admin-card">
                    <h3>1. Área do Administrador (Admin)</h3>
                    <p>O Administrador possui <strong>acesso total</strong> ao sistema e a todas as operações de CRUD.</p>
                    <ul>
                        <li><strong>Gerenciamento Completo de Dados:</strong> Pode **criar**, **ler**, **atualizar** e **excluir** **todos** os registros de atletas.</li>
                        <li><strong>Importação Inicial:</strong> Responsável pelo **upload das planilhas CSV** com a lista inicial de inscritos.</li>
                        <li><strong>Gerenciamento de Usuários:</strong> Pode **registrar** e **gerenciar** as contas de outros administradores e usuários de Staff.</li>
                    </ul>
                </div>
                <div class="card staff-card">
                    <h3>2. Área do Staff (Pesquisa e Complementação)</h3>
                    <p>O Staff possui acesso limitado, focado na **pesquisa** e **complementação** dos dados.</p>
                    <ul>
                        <li><strong>Pesquisa (READ):</strong> Permite **buscar o atleta** na base de dados.</li>
                        <li><strong>Registro/Atualização (CREATE/UPDATE):</strong> Permite **adicionar informações** ou **atualizar** os dados do atleta pesquisado.</li>
                        <li><strong>Restrição:</strong> **Não** tem permissão para **excluir** registros de atletas ou gerenciar usuários.</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="section">
            <h2 class="section-title">💻 Fluxo de Trabalho</h2>
            <ol class="flow-list">
                <li><strong>Inscrição Inicial:</strong> O <strong>Admin</strong> realiza o **Upload da planilha CSV** com os atletas inscritos.</li>
                <li><strong>Preparação:</strong> O <strong>Admin</strong> cadastra as contas necessárias para o Staff.</li>
                <li><strong>Operação (Staff):</strong> Um membro do <strong>Staff</strong> acessa a área de pesquisa.</li>
                <li><strong>Pesquisa (READ):</strong> O Staff **pesquisa** pelo nome de um atleta.</li>
                <li><strong>Registro/Atualização (CREATE/UPDATE):</strong> Ao encontrar o atleta, o Staff pode **confirmar ou complementar** os dados.</li>
                <li><strong>Manutenção (Admin):</strong> O **Admin** monitora, edita dados incorretos e remove eventuais duplicidades ou desistências.</li>
            </ol>
        </section>
    </div>
    <div>
      <h2>Pseudocodigo de index.php</h2>
      <p>
        INÍCIO<br>
<br>
CARREGAR página HTML<br>
CARREGAR CSS e Bootstrap<br>
<br>
MOSTRAR barra de navegação com:<br>
    - Logo<br>
    - Link "Home"<br>
    - Link "Admin"<br>
    - Link "Eventos"<br>
    - Menu "Staff" com opções:<br>
        - Cadastrar<br>
        - Entrar<br>
<br>
LEITURA do parâmetro "page" da URL<br>
SE "page" NÃO existir<br>
    DEFINIR page = vazio<br>

INICIAR estrutura principal da página<br>
<br>
ESCOLHER (page)<br>
    CASO "entrar_admin":<br>
        INCLUIR arquivo entrar_admin.php<br>
    CASO "admin":<br>
        INCLUIR arquivo admin.php<br>
    CASO "salvar_admin":<br>
        INCLUIR arquivo salvar_admin.php<br>
    CASO "cadastrar_staff":<br>
        INCLUIR arquivo cadastrar_staff.php<br>
    CASO "salvar_staff":<br>
        INCLUIR arquivo salvar_staff.php<br>
    CASO "entrar_staff":<br>
        INCLUIR arquivo entrar_staff.php<br>
    CASO "staff":<br>
        INCLUIR arquivo staff.php<br>
    CASO "listar_evento":<br>
        INCLUIR arquivo listar_eventos_geral.php<br>
    CASO DEFAULT:<br>
        MOSTRAR elemento HTML com id="texto"<br>
        DEFINIR frase = "Olá! Bem vindo ao sistema de entrega de kit Brasil Corrida"<br>
        DEFINIR i = 0<br>
        FUNÇÃO escrever():<br>
            SE i < tamanho de frase<br>
                ADICIONAR caractere frase[i] dentro do elemento "texto"<br>
                i = i + 1<br>
                AGENDAR escrever() novamente após 60ms<br>
            SENÃO<br>
                ENCERRAR animação<br>
        EXECUTAR escrever()<br>
FIM ESCOLHER<br>
FIM<br>
      </p>
    </div>
    <div>
    <p>
<br>                            ┌──────────────────────────────┐
    <br>                        │   INÍCIO DO SISTEMA          │
        <br>                    └──────────────┬───────────────┘
            <br>                               │
                <br>                           ▼
<br>                        ┌────────────────────────────────────────┐
<br>                        │ Carregar página HTML + CSS + Bootstrap │
<br>                        └─────────────────────┬──────────────────┘
<br>                                              │
<br>                                              ▼
 <br>                            ┌─────────────────────────────────┐
<br>                             │ Mostrar barra de navegação      │
 <br>                            └─────────────────┬───────────────┘
 <br>                                              │
  <br>                                             ▼
   <br>                        ┌────────────────────────────────────────┐
  <br>                         │ Ler parâmetro "page" da URL            │
      <br>                     └──────────────────────┬─────────────────┘
          <br>                                       │
              <br>                ┌──────────────────┴─────────────────┐
                  <br>            │ "page" existe?                     │
                      <br>        └───────────────┬────────────────────┘
 <br>                                             │SIM
     <br>                                         │
         <br>                                     ▼
             <br>        ┌──────────────────────────────────────────────────────┐
                 <br>    │ Redirecionar para o arquivo correspondente:          │
<br>                     │ - entrar_admin.php                                   │
    <br>                 │ - admin.php                                          │
        <br>             │ - salvar_admin.php                                   │
            <br>         │ - cadastrar_staff.php                                │
                <br>     │ - salvar_staff.php                                   │
<br>                     │ - entrar_staff.php                                   │
    <br>                 │ - staff.php                                          │
        <br>             │ - listar_eventos_geral.php                           │
            <br>         └──────────────────────────────┬───────────────────────┘
<br>                                                    │
    <br>                                                ▼
        <br>                               ┌───────────────────────┐
            <br>                           │ Executar o módulo     │
                <br>                       │ escolhido             │
                    <br>                   └───────────┬───────────┘
                        <br>                           │
                            <br>                       ▼
                                <br>    ┌────────────────────────────┐
<br>                                    │      FIM DA EXECUÇÃO       │
    <br>                                └────────────────────────────┘
        <br>                                         NÃO
            <br>                                      │
                <br>                                  ▼
<br>                     ┌───────────────────────────────────────────────────────┐
    <br>                 │ Mostrar tela inicial com texto animado (typewriter):  │
        <br>             │ "Olá! Bem vindo ao sistema de entrega de kit ..."     │
            <br>         └───────────────────────────┬───────────────────────────┘
                <br>                                 │
                    <br>                             ▼
                        <br>           ┌───────────────────────────┐
                            <br>       │  Executar animação JS     │
                                <br>   └─────────────┬─────────────┘
                                    <br>             │
                                        <br>         ▼
<br>                                   ┌───────────────────────────┐
    <br>                               │          FIM              │
        <br>                           └───────────────────────────┘
    </p>
    </div>
</body>
</html>
