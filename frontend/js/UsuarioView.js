function exibirUsuarios(usuarios) {
    linhas = document.getElementById('listaUsuarios').rows;
    limparTabela(linhas)
    popularTabela(usuarios)
}


function limparTabela(linhas){
    for (i= linhas.length-1; i>=0; i--){
        excluirLinhaTabela(i)
    }
    
}

function excluirLinhaTabela(i){
    document.getElementById('listaUsuarios').deleteRow(i);
}

function popularTabela(usuarios){
    for(i = 0; i < usuarios.length; i++){
        exibirLinhaTabela(usuarios[i]);
    }
}

function exibirLinhaTabela(usuario){

    let table = document.getElementById('listaUsuarios');
    let numLinhas = table.rows.length;
    let novaLinha = table.insertRow(numLinhas);

    let celCodigo = novaLinha.insertCell(0);
    celCodigo.innerHTML = usuario.codigo;

    let celNome = novaLinha.insertCell(1);
    celNome.innerHTML = usuario.nome;

    let celEmail = novaLinha.insertCell(2);
    celEmail.innerHTML = usuario.email;

    let celLogin = novaLinha.insertCell(3);
    celLogin.innerHTML = usuario.login;

    
}

function validarUsuario(acao) {

    let nome = document.getElementById('nome');
    let email = document.getElementById('email');
    let login = document.getElementById('login');
    let senha = document.getElementById('senha');
    let validarSenha = document.getElementById('validarSenha');

    if (acao === 'add') {
        let dadosValidos = true;

        if (nome.value == '') {
            dadosValidos = false;
            alert('Preencha o campo nome');
        } else if (email.value == '') {
            dadosValidos = false;
            alert('Preencha o campo email');            
        } else if (login.value == '') {
            dadosValidos = false;
            alert('Preencha o campo login');            
        } else {
            if(senha.value != '') {
                if (validarSenha.value == senha.value) {
                    if(senha.value.length > 6){
                        dadosValidos = false;
                        alert('A precisa ao menos 6 carcteres');                
                    }
                } else {
                    dadosValidos = false;
                    alert('As senhas devem coincidir');            
                }
            } else {
                dadosValidos = false;
                alert('Preencha o campo senha');            
            }
        }
        if (dadosValidos) {
            let objUsuario = {
                "nome": nome.value,
                "email": email.value,
                "login": login.value,
                "senha": senha.value,
            }

            adicionarUsuarios(objUsuario);
        }
    }

    return false;
}

window.onload = function(){
    this.getUsuarios();
}