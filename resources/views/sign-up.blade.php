<!DOCTYPE html>
<html lang="Pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/log-and-sing-up.css">
    <title>TODO | sign-up</title>
</head>
<body>
    <div class="circle"></div>
    <div class="circle"></div>
    <main> 
        <section class="content-container">
            <div class="content">
                <h1>Gerencie as suas tarefas com maior eficência</h1>
                <p>Anote as coisas importantes de forma simples
                    e sem compicações nenhuma. Cadastre-se ou faça login para obter maior produtividade, garantindo que todas as suas tarefas são realizadas no tempo pretendido!
                </p>
                <form action="#" method="get" onsubmit="avail()">
                    <button style="border:2px solid rgb(56, 100, 182)" class="btn" >Envie-nos uma nota de avaliação</button> 
                </form>
            </div>

        </section>

        <section class="sing-up-container">
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1>Novo utilizador</h1>
                <input type="email" name="email" id="email" placeholder="Email" />
                <input type="text" name="name" id="name" placeholder="Nome do utilizador"/>
                <input type="password" name="password" id="password" placeholder="Palavra-passe"/>
                <input type="password" name="conf_password" id="conf-password" placeholder="Confirmar palavra-passe"/>
                <button type="submit">Criar</button>
                <section class="error" style="width: 100%; color:crimson; font-size: 16px; text-align:center;">
                    @if($errors->any())
                        <p>{{ $errors->all()[0] }}</p><br>
                    @else
                        @if($errorMessage = Session::get('error'))
                        <p>{{ $errorMessage }}</p><br>
                        @endif
                    @endif
                </section>
            </form>
            <div class="separator"></div>
            <form action="{{ route('login') }}" method="get">
                <button class="btn outlined" >Login</button> 
            </form>

        </section>
    </main>
    <script src="../script/app.js"></script>
</body>
</html>