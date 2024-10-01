<!DOCTYPE html>
<html lang="Pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/log-and-sing-up.css">
    <title>TODO | Login</title>
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

        <section class="log-container">
            <h1>Login</h1>
            <form action="{{ route('auth') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="email" name="email" id="email" placeholder="E-mail"/>
                <input type="password" name="password" id="password" placeholder="Palavra-passe"/>
                <div style="display:flex; align-items:center; gap:8px; margin:8px 8px;">
                    <input type="checkbox" name="remember" id="remember"/>   
                    <label style="font-size:1.3rem; cursor:pointer;" for="remember">lembrar-me</label>
                </div>
                <button type="submit" class="log">Entrar</button>
                <div class="separator"></div>
                <section class="error" style="width: 100%; color:rgb(220, 20, 97); font-size: 16px; text-align:center;">
                    @if($errors->any())
                        <p>{{ $errors->all()[0] }}</p><br>
                    @else
                        @if($errorMessage = Session::get('error'))
                        <p>{{ $errorMessage }}</p><br>
                        @endif
                    @endif
                </section>
            </form>
            <form class="form-new-user" action="{{ route('user.create') }}" method="get">
                <button class="btn outlined" >Criar utilizador</button> 
            </form>
        </section>
    </main>
    <script src="../script/app.js"></script>
</body>
</html>