<!DOCTYPE html>
<html lang="Pt-pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/home-and-tasks.css">
    <title>TODO | Task</title>
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
        <div class="header-card">
            <div class="header-content">
                <p id="date">{{ $task->created_at}}</p>
                <h2 
                concluded = "{{ $task->concluded }}" abandoned = "{{ $task->abandoned }}">{{ Str::limit($task->title,40) }}</h2>
                @if (!($task->concluded || $task->abandoned))
                    <div class="header-content-actions">
                      <form action="{{route('task.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$task->id}}">
                        <input type="hidden" name="title" value="{{$task->title}}">
                        <input type="hidden" name="id_user" value="{{$task->id_user}}">
                        <input type="hidden" name="concluded" value="1">
                        <input type="hidden" name="abandoned" value="{{$task->abandoned}}">
                        <button class="btn-check"type="submit">Concluir</button>
                      </form>
                    <button class="btn-abandon" onclick="AbandonModal.open()">Abandonar</button>
                </div>
            </div>
            <div class="header-action">
            <div class="btn">
                <a onclick="Modal.open()">Nova etapa</a>
            </div>
            </div>
            @endif    
        </div>
    </header>
    <main>
      <p class="title-init-list-sub">Lista de etapas</p>
      <section class="etapa-container">
        @if ($errors->any())
            <h3 style="color: crimson; font-weight:600; text-align:center;">{{ $errors->all()[0] }}</h3>
        @endif
            @foreach(array_reverse($task->subtasks->all(), true) as $subtask)
                <div class="option-container subtask" attr-value ="{{ $subtask->concluded }}">
                    <h3 style="font-style:italic;">{{ $subtask->note }}</h3>
                    @if (!($subtask->concluded) && !($task->concluded || $task->abandoned))
                        <div class="action">
                        <form action="{{ route('subtask.update') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <input type="hidden" name="id" value="{{ $subtask->id }}">
                          <input type="hidden" name="note" value="{{ $subtask->note }}">
                          <input type="hidden" name="id_task" value="{{ $task->id }}">
                          <input type="hidden" name="concluded" value="1">
                            <button type="submit" id="btn-check"></button>
                        </form>
                        <form action="{{ route('subtask.destroy') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          @method('DELETE')
                          <input type="hidden" name="id" value="{{ $subtask->id }}">
                            <button type="submit" id="btn-delete"></button>
                        </form>
                    </div>
                    @endif
                    
                </div>
            @endforeach
            
        </section>
    </main>

    {{-- new subtask modal --}}
    <div class="modal-wrapper">
        <div class="note modal-container" id="modal-container">
          <h2>Nova nota</h2>
          <form action="{{ route('subtask.storage') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="note" id="note" placeholder="Nota..."><br>
            <input type="hidden" name="id_task" value="{{ $task->id }}">
            <input type="hidden" name="concluded" value="0">
            <div class="actions">
              <button type="submit">Criar</button>
              <a class="btn" onclick="Modal.close()">cancelar</a>
            </div>
          </form>
        </div>
      </div>

           <!-- Modal confirm abandon task -->
     <div class="abandon-modal-wrapper">
        <div class="abandon-modal-container" id="abandon-modal-container">
          <h2>Abandonar tarefa</h2>
          <p>Deseja abandonar esta tarefa?</p>
          <form action="{{ route('task.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="actions">
                @method('PUT')
                <input type="hidden" name="id" value="{{$task->id}}">
                <input type="hidden" name="title" value="{{$task->title}}">
                <input type="hidden" name="id_user" value="{{$task->id_user}}">
                <input type="hidden" name="concluded" value="0">
                <input type="hidden" name="abandoned" value="1">
              <button type="submit">Sim</button>
            </form>
              <a class="btn" onclick="AbandonModal.close()">Não</a>
            </div>
        </div>
      </div>
      <script src="../script/app.js"></script>
</body>
</html>