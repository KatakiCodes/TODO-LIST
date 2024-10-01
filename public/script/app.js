const modalContainer = document.getElementById('modal-container');
const ExcludeModalContainer = document.getElementById('exclude-modal-container');
const AbandonContainer = document.getElementById('abandon-modal-container');


Modal = {
    open(){
        document.querySelector('.modal-wrapper').classList.add('active');
        modalContainer.style.animation = 'slideIn 0.7s ease-in-out';
    },
    close(){
        modalContainer.style.animation = 'slideOut 0.7s ease-in-out forwards';
        document.querySelector('.modal-wrapper.active').classList.remove('active');
    }
}
ExcludeModal = {
    open(id){
        let modalwrapper =  document.querySelector('.exclude-modal-wrapper');
        let modalcontent = document.querySelector('.exclude-modal-container');
        document.getElementsByName('id_task_delete').Value = id;
        modalwrapper.classList.add('active');
        ExcludeModalContainer.style.animation = 'slideIn 0.7s ease-in-out';
    },
    close(){
        ExcludeModalContainer.style.animation = 'slideOut 0.7s ease-in-out forwards';
        document.querySelector('.exclude-modal-wrapper.active').classList.remove('active');
    }
}
AbandonModal = {
    open(){
        document.querySelector('.abandon-modal-wrapper').classList.add('active');
        AbandonContainer.style.animation = 'slideIn 0.7s ease-in-out';
    },
    close(){
        AbandonContainer.style.animation = 'slideOut 0.7s ease-in-out forwards';
        document.querySelector('.abandon-modal-wrapper.active').classList.remove('active');
    }
}

//Task actions

function filterConcludedTasks()
{
    let taskListComponent = document.querySelectorAll('.option-container');
    taskListComponent.forEach(taskElement => {
    if(taskElement.getAttribute('attr-value') == 1){
        taskElement.style.color = 'gray';
        taskElement.style.background = '#eaebee';
    }

    else if(taskElement.getAttribute('attr-value2') == 1)
    {
        taskElement.style.color = 'gray';
        taskElement.style.background = '#f7dede';
        taskElement.style.textDecoration = 'line-through';
    }

    });
}
function filterConcludedSubtasks()
{
    let subtaskListComponent = document.querySelectorAll('.option-container.subtask');
    subtaskListComponent.forEach(subtaskElement =>{
        if(subtaskElement.getAttribute('attr-value') == 1)
        {
            subtaskElement.style.color = '#7e7e7e';    
            subtaskElement.style.textDecoration = 'line-through';    
            subtaskElement.style.fontstyle = 'initial';    
        }
    });
}
function filterAbandonedSubTask()
{
    let title = document.querySelector('.header-content h2');
    if(title != null)
    {
        if(title.getAttribute('abandoned') == 1)
        {
            title.style.color = 'gray';
            title.style.textDecoration = 'line-through';   
        }

    }
}

function avail()
{
    let note = prompt('De 0 a 10, dá-nos uma nota')
    if(isNaN(note) || note < 0 || note == "" || note > 10)
        alert('A nota informada não está no intervalo de 0 a 10');
    else
        alert('Agradecemos pela sua avaliação');
}

filterConcludedSubtasks();
filterConcludedTasks();
filterAbandonedSubTask();