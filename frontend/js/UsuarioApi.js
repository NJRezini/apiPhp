let url = 'http://localhost:8000';

function getUsuarios() {
  let data = new FormData(),
    xhr = new XMLHttpRequest();
  //   xhr.withCredentials = true;

  xhr.addEventListener('readystatechange', function () {
    if (this.readyState === 4) {
      let usuarios = JSON.parse(this.responseText);
      exibirUsuarios(usuarios);
    }
  });

  xhr.open('GET', url);
  xhr.send(data);
}

function adicionarUsuarios(objUsuario) {
  let xhr = new XMLHttpRequest();

  xhr.addEventListener('readystatechange', function () {
    if (this.readyState === 4) {
      let usuarios = JSON.parse(this.responseText);
      alert('Usuario adicionado');
      getUsuarios();
    }
  });

  xhr.open('POST', url);

  xhr.send(JSON.stringify(objUsuario));
}

function removerUsuarios(objUsuario) {
  let xhr = new XMLHttpRequest();

  xhr.addEventListener('readystatechange', function () {
    if (this.readyState === 4) {
      alert('Usuario deletado');
      getUsuarios();
    }
  });

  xhr.open('DELETE', url);

  xhr.send(JSON.stringify(objUsuario));
}

function alterarUsuarios(objUsuario) {
  let xhr = new XMLHttpRequest();

  xhr.addEventListener('readystatechange', function () {
    if (this.readyState === 4) {
      alert('Usuario alterado');
      getUsuarios();
    }
  });

  xhr.open('PUT', url);

  xhr.send(JSON.stringify(objUsuario));
}
