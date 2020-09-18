function exibirUsuarios(usuarios) {
    popularTabela(usuarios)
}

function popularTabela(usuarios){
    for(i = 0; i < usuarios.length; i++){
        exibirLinhaTabela(usuarios[i]);
    }
}

function exibirLinhaTabela(usaurio){
    let table = document.getElementById('listaUsuarios');
    let numLinhas = table.rows.length;
    let novaLinha = table.insertRow(numLinhas);

    let celCodigo = novaLinha.insertCell(0);
    celCodigo.innerHTML = usaurio.codigo;

    let celNome = novaLinha.insertCell(1);
    celNome.innerHTML = usaurio.nome;

    let celEmail = novaLinha.insertCell(2);
    celEmail.innerHTML = usaurio.email;

    let celLogin = novaLinha.insertCell(3);
    celLogin.innerHTML = usaurio.login;

    
}