function calcPrev(){

	// idade atual
	var idade = document.getElementById('idade').value;
	
	// tempo de contribuicao
	var cont = document.getElementById('cont').value;
	
	// faixa salarial
	var sal = document.getElementById('salario').value;

	// verifica e define sexo
	var sexo = document.getElementsByName('sex');

	for (var i = 0, length = sexo.length; i < length; i++){
		
		if (sexo[i].checked){

	  		// do whatever you want with the checked radio
	  		sexo = sexo[i].value;

	  		// only one radio can be logically checked, don't check the rest
			break;
		}
	}

	// verifica e define setor
	var setor = document.getElementsByName('setor');

	for (var i = 0, length = setor.length; i < length; i++){
		
		if (setor[i].checked){

	  		// do whatever you want with the checked radio
	  		setor = setor[i].value;

	  		// only one radio can be logically checked, don't check the rest
			break;
		}
	}

	// verifica e define profissao
	var profissao = document.getElementsByName('profissao');

	for (var i = 0, length = profissao.length; i < length; i++){
		
		if (profissao[i].checked){

	  		// do whatever you want with the checked radio
	  		profissao = profissao[i].value;

	  		// only one radio can be logically checked, don't check the rest
			break;
		}
	}

	// calculos(idade, sexo, cont, setor, profissao);

	// idade minima para homens setor publico ou privado
	var idadeMin = 65;

	// tempo de contribuicao minima
	var contribuicaoMin = 25;

	var tiposal = 0.7;

	var anoexcedente = 0.2;

	// caso sexo feminino
	if (sexo == 1) {
		idadeMin = 62;
	}

	// caso professor ou trabalhador rural homem ou mulher 
	if (profissao >= 1) {
		idadeMin = 60;
	}

	if (setor == 1 || profissao > 0) {
		contribuicaoMin = 20;
		tiposal = 0.6;
	}

	// se o tempo de contribuição exceder o tempo mínimo
	if ((cont - idadeMin) >= 0 ){
		tiposal = tiposal + anoexcedente * (cont - idadeMin);
	}
	
	// verifica se há porcentagem adicional para o calculo da aposentadoria e o tipo de aposentadoria.
	sal = sal * tiposal;

	// se o valor do salário calculado for inferior a um salário mínimo o valor da aposentadora é de um salário mínimo.
	if(sal <= 998){
		sal = 998;
	}

	// imprime elementos na tela
	// anos restantes de contribuicao
	var anos = document.getElementById('anos');
	anos.innerText = (contribuicaoMin - cont);

	// Idadem mínima para solicitar aposentadoria
	var idMin = document.getElementById('idade-minima');
	idMin.innerText = (idadeMin);

	// imprime valor do salário aposentadoria na tela
	var meusalario = document.getElementById('valor');
	meusalario.innerText = sal.toFixed(2);

	var faltamAnos = document.getElementById('anos-fim');
	faltamAnos.innerText = (idadeMin - idade);

}