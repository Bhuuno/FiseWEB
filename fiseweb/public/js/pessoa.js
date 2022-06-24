////////////////////////////////// VALIDAR CPF
function verificarCPF()
{
    var input = document.querySelector('#cpf');
    var cpf = input.value;

    var validacao = TestaCPF(cpf);
    
    if(validacao == true)
    {
        document.getElementById("exemplo").textContent="CPF validado!";
        document.getElementById('cpf').style.backgroundColor='#33CC66';
        // document.getElementById('cpf').value(cpf);
    }
}

function TestaCPF(strCPF)
{
    var opcao = 0;
    if(strCPF.length < 12 )
    {
        console.log(strCPF.length);
        document.getElementById("exemplo").textContent="Ex: 00000000000";
        document.getElementById('cpf').style.backgroundColor='red';
        if(strCPF.length == 11 )
        { 
            var cpf;
            cpf = strCPF;
            cpf = cpf.replace(/[^\d]+/g,'');	
            if(cpf == '') return false;	
            // Elimina CPFs invalidos conhecidos	
            if (cpf.length != 11 || 
                cpf == "00000000000" || 
                cpf == "11111111111" || 
                cpf == "22222222222" || 
                cpf == "33333333333" || 
                cpf == "44444444444" || 
                cpf == "55555555555" || 
                cpf == "66666666666" || 
                cpf == "77777777777" || 
                cpf == "88888888888" || 
                cpf == "99999999999")
                    return false;		
            // Valida 1o digito	
            add = 0;	
            for (i=0; i < 9; i ++)		
                add += parseInt(cpf.charAt(i)) * (10 - i);	
                rev = 11 - (add % 11);	
                if (rev == 10 || rev == 11)		
                    rev = 0;	
                if (rev != parseInt(cpf.charAt(9)))		
                    return false;		
            // Valida 2o digito	
            add = 0;	
            for (i = 0; i < 10; i ++)		
                add += parseInt(cpf.charAt(i)) * (11 - i);	
            rev = 11 - (add % 11);	
            if (rev == 10 || rev == 11)	
                rev = 0;	
            if (rev != parseInt(cpf.charAt(10)))
                return false;		
            return true;
        }
        // var body = document.body;
        // var paragrafo = document.createElement('p');

        // var texto = document.createTextNode("Quantidade inferior");

        // paragrafo.appendChild(texto);

        // body.appendChild(paragrafo);
    }
    else if (strCPF.length >= 12)
    {
        document.getElementById("exemplo").textContent="CPF invalido!";
        document.getElementById('cpf').style.backgroundColor='#FF0000';
    }
} 
////////////////////////////////// BUSCAR ENDEREÇO
function verificarCEP()
{
    var input = document.querySelector('#cep');
    var cep = input.value;

    pesquisacep(cep);
}
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    // document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    // document.getElementById('uf').value=("");
    // document.getElementById('ibge').value=("");
}
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value=(conteudo.logradouro);
        // document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        // document.getElementById('uf').value=(conteudo.uf);
        // document.getElementById('ibge').value=(conteudo.ibge);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}
function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor;

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="...";
            // document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            // document.getElementById('uf').value="...";
            // document.getElementById('ibge').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            //alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}