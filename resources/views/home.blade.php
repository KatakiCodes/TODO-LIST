<!DOCTYPE html>
<html lang="Pt-pt">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/global.css" />
    <link rel="stylesheet" href="../style/home-and-tasks.css" />
    <title>TODO | Home</title>
  </head>

  <body>
    <header>
      <div class="logo" style="display: flex; align-items:center; justify-content:space-between;">
        <a href="/"><img src="../Assets/images/TodoApp.png" alt="Todo-app-logo" /></a>
        @auth
         <h2>{{ auth()->user()->email }}</h2>
         <form action="{{route('logout')}}" method="post" enctype="multipart/form-data">
          @csrf
              <button style="color: gray" type="submit">Saír</button>
         </form>
        @endauth
      </div>
      <div class="header-image"></div>
      <div class="home-header-card-container">
        <div class="home-header-card">
          <p class="out-card-title">Total</p>
          <div class="home-card-option">
            <p class="inner-card-title">Total</p>
            <h2>{{ $tasks->count() }}</h2>
          </div>
        </div>
        <div class="home-header-card">
          <p class="out-card-title">Concluídas</p>
          <div class="home-card-option">
            <p class="inner-card-title">Concluidas</p>
            <h2>{{ $tasks->where('concluded',true)->count() }}</h2>
          </div>
        </div>
        <div class="home-header-card">
          <p class="out-card-title">Abandonadas</p>
          <div class="home-card-option">
            <p class="inner-card-title">Abandonadas</p>
            <h2>{{ $tasks->where('abandoned',true)->count() }}</h2>
          </div>
        </div>
      </div>
      <a class="btn new-task" onclick="Modal.open()">+</a>
    </header>
    <main>
      <p class="title-init-list">Lista de tarefas</p>
      <section class="etapa-container">
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <h3 style="color: crimson; text-align:center; font-weight:400; ">{{ $error }} <br></h3>
            @endforeach
        @endif
        @foreach(array_reverse($tasks->all(),true) as $task)
        <a href="{{ route('task.show',['title'=>$task->title]) }}">
          <div class="option-container task" id="option-container" attr-value='{{ $task->concluded }}' attr-value2='{{ $task->abandoned }}'>
            <h3>{{ $task->title }}</h3>
            @if (!($task->concluded || $task->abandoned))
              <div class="action" id="actionsTask">
                <form action="{{route('task.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="{{ $task->id }}">
                  <input type="hidden" name="title" value="{{ $task->title }}">
                  <input type="hidden" name="id_user" value="{{ $task->id_user }}">
                  <input type="hidden" name="concluded" value="1">
                  <input type="hidden" name="abandoned" value="0">
                  <button type="submit" id="btn-check"></button>
                </form>
              <a id="btn-delete" onclick="ExcludeModal.open({{ $task->id }})"></a>
            </div>
            @endif
           
          </div>
          </div>
        </a>
        @endforeach

      </section>
    </main>
    <!-- Modal create task -->
    <div class="modal-wrapper">
      <div class="modal-container" id="modal-container">
        <h2>Nova tarefa</h2>
        <form action="{{ route('task.storage') }}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="text" name="title" id="title" placeholder="Tarefa..."/><br>
          <input type="hidden" name="id_user" value="{{ auth()->user()->id }}"/>
          <input type="hidden" name="concluded" value="0"/>
          <input type="hidden" name="abandoned" value="0"/>
          <div class="actions">
            <button type="submit">Criar</button>
            <a class="btn" onclick="Modal.close()">cancelar</a>
          </div>
        </form>
      </div>
    </div>

     <!-- Modal confirm delete task -->
     <div class="exclude-modal-wrapper">
      <div class="exclude-modal-container" id="exclude-modal-container">
        <h2>Excluir tarefa</h2>
        <p>Deseja exluir esta tarefa?</p>
        <form action="{{ route('task.delete') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <div class="actions">
            <button type="submit">Sim</button>
            <a class="btn" onclick="ExcludeModal.close()">Não</a>
          </div>
        </form>
      </div>
    </div>
    <script src="../script/app.js"></script>
  </body>
</html>
