let url = 'http://localhost:8000';

function getUsuarios() {
    let data = new FormData(),
    xhr = new XMLHttpRequest();
    // xhr.withCredentials = true

    xhr.addEventListener('readystatechange', function(){
        if(this.readyState === 4){
            let usuarios = JSON.parse(this.responseText);
            exibirUsuarios(usuarios);
        }
    });

    xhr.open('GET', url);
    xhr.send(data);
}