<?php
session_start();


?>
<!doctype html>
<!-- commit teste -->
  <html lang="pt-br">
  <head>
    <meta charset="utf-8">

    <title>420delivery Quiz - Queremos sua opinião!</title>
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="icon" href="img/favicon-16.png" sizes="16x16">
    <link rel="icon" href="img/favicon-32.png" sizes="32x32">

    <link href="inc/jqueryui/css/ui-lightness/jquery-ui-1.10.4.css" rel="stylesheet">

    <link rel="stylesheet" href="css/fonts/wcmanonegrabta_regular_macroman/stylesheet.css" type="text/css" charset="utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>

	<script src="inc/jqueryui/js/jquery-1.10.2.js"></script>
	<script src="inc/jqueryui/js/jquery-ui-1.10.4.js"></script>

	<!-- Aqui incluo os JS necessarios para o slider das sedas -->
	<script type="text/javascript" src="inc/jssor/functions.js"></script>
    <script type="text/javascript" src="inc/jssor/jssor.core.js"></script>
    <script type="text/javascript" src="inc/jssor/jssor.utils.js"></script>
    <script type="text/javascript" src="inc/jssor/jssor.slider.js"></script>
	
	<!-- Slick slider -->
	<link rel="stylesheet" type="text/css" href="inc/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="inc/weather-icons/css/weather-icons.css"/>
    <link rel="stylesheet" href="css/style.css">
  </head>

	<body>
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=225836800874912&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

	<div class="container">
		<form action="index.php"  method="post" class="" id="formquiz">
		<div class="form-quiz">

			<div class="pergunta" id= "pergunta0">
				<img src="img/logo_transparente.png" alt="420delivery" title="420delivery" class="logo">
				<span>O 420 delivery é um novo conceito em laricas e sedas em breve na cidade de Bauru. Gostaríamos da sua opinião!</span>
				<b class="button" id="comecar" type>começar quiz</b>
			</div>

			<div class="pergunta" id= "pergunta1 ">
				<h2>Em que cidade você mora?</h2>
				<h4>&nbsp;</h4>
				<span class="ui-helper-hidden-accessible" role="status" aria-live="polite"></span>
				<input id="text_0" name="cidade" class="ui-autocomplete-input" type="text" autocomplete="off">
			</div>

			<div class="pergunta" id= "pergunta2">
				<h2>Em que dia bate a larica forte?</h2>
				<h4>Escolha quantos dias quiser. Quando você vai querer salgados deliciosos?</h4>
				<div class="dias-semana">
					<ul id="multipla_1">
						<li id="domingo" alt="Domingo" title="Domingo">D<span>Domingo</span></li>
						<li id="segunda" alt="Segunda-Feira" title="Segunda-Feira">S<span>Segunda</span></li>
						<li id="terça" alt="Terça-Feira" title="Terça-Feira">T<span>Terça</span></li>
						<li id="quarta" alt="Quarta-Feira" title="Quarta-Feira">Q<span>Quarta</span></li>
						<li id="quinta" alt="Quinta-Feira" title="Quinta-Feira">Q<span>Quinta</span></li>
						<li id="sexta" alt="Sexta-Feira" title="Sexta-Feira">S<span>Sexta</span></li>
						<li id="sabado" alt="Sábado" title="Sábado">S<span>Sábado</span></li>
					</ul>
				</div>
				<input id="multipla_1_hidden" name="dias_semana" type="hidden">
			</div>

			<div class="pergunta" id= "pergunta3">
				<h2>Que horas?</h2>
				<h4>Café da manhã dos campeões? Assalto à geladeira de madrugada? Escolha até 2 períodos.	</h4>
				<div class="horas-dia">
				<ul id="multipla_2">
					<li id="manha"><i class="wi wi-day-cloudy"></i><br> Manhã</li>
					<li id="tarde"><i class="wi wi-day-sunny"></i><br> Tarde</li>
					<li id="noite"><i class="wi wi-night-clear"></i><br> Noite</li>
					<li id="madrugada"><i class="wi wi-stars"></i><br> Madrugada</li>
				</ul>
				</div>
				<input id="multipla_2_hidden" name="periodo" type="hidden">
			</div>

			<div class="pergunta" id= "pergunta4">
				<h2>Qual sua seda preferida?</h2>
				<div class='slider-wrapper' style='position:relative; height:100px;'>
					<?php include("slider_interno.php"); ?>
				</div>
			</div>
			<div class="pergunta" id= "tela_final">
				<h2>Enviando preferências...</h2>
				<div class="pisca-pisca enviandocoxinhas">
                   <a href="#" onclick="fb_login();">
                        <br>
                      Você ganhou <br>
                      <b>10</b> pontas! <br>
                       <span>
                      Transforme as pontas em coxinhas e sedas!
                        </span>
                    </a>
                </div>
                <div class="facebook-wrapper">
                    <div class="fb-like-box" data-href="https://www.facebook.com/420deliverybauru" 
                       data-width="285" data-height="180" data-colorscheme="light" data-show-faces="true" 
                       data-header="false" data-stream="false" data-show-border="false">
                    </div>
                </div>
			</div>
		</div>
		</form>
      <!-- Salva o id do Quiz para salvar os pontos no perfil -->
      <input type="hidden" value="" id="idQuiz">
	</div>
<script>
    
    function afterChange(slider,i) {
        if (i == (slider.slideCount-1) ) //chegou no último
        {
            enviaDados();
        }
    }
    
	$(document).ready(function(){

		$("#comecar").click(function(){
			$('.form-quiz').slickNext();
		});
		$('.form-quiz').keypress(function( e ) {
			if ( e.which == 13 || e.which == 9 || e.keyCode == 13  || e.keyCode == 9)  {
				e.preventDefault();

				$('.form-quiz').slickNext();
			}
		});
		$('.form-quiz').slick({
		  dots: true,
		  speed: 500,
		  infinite: false,
		  onAfterChange: afterChange,
		  swipe:false,
		});

		var alternativas = ["Adamantina","Adolfo","Aguaí","Águas da Prata","Águas de Lindóia","Águas de Santa Bárbara","Águas de São Pedro","Agudos","Alambari","Alfredo Marcondes","Altair","Altinópolis","Alto Alegre","Alumínio","Álvares Florence","Álvares Machado","Álvaro de Carvalho","Alvinlândia","Americana","Américo Brasiliense","Américo de Campos","Amparo","Analândia","Andradina","Angatuba","Anhembi","Anhumas","Aparecida","Aparecida d'Oeste","Apiaí","Araçariguama","Araçatuba","Araçoiaba da Serra","Aramina","Arandu","Arapeí","Araraquara","Araras","Arco-Íris","Arealva","Areias","Areiópolis","Ariranha","Artur Nogueira","Arujá","Aspásia","Assis","Atibaia","Auriflama","Avaí","Avanhandava","Avaré","Bady Bassitt","Balbinos","Bálsamo","Bananal","Barão de Antonina","Barbosa","Bariri","Barra Bonita","Barra do Chapéu","Barra do Turvo","Barretos","Barrinha","Barueri","Bastos","Batatais","Bauru","Bebedouro","Bento de Abreu","Bernardino de Campos","Bertioga","Bilac","Birigui","Biritiba-Mirim","Boa Esperança do Sul","Bocaina","Bofete","Boituva","Bom Jesus dos Perdões","Bom Sucesso de Itararé","Borá","Boracéia","Borborema","Borebi","Botucatu","Bragança Paulista","Braúna","Brejo Alegre","Brodowski","Brotas","Buri","Buritama","Buritizal","Cabrália Paulista","Cabreúva","Caçapava","Cachoeira Paulista","Caconde","Cafelândia","Caiabu","Caieiras","Caiuá","Cajamar","Cajati","Cajobi","Cajuru","Campina do Monte Alegre","Campinas","Campo Limpo Paulista","Campos do Jordão","Campos Novos Paulista","Cananéia","Canas","Cândido Mota","Cândido Rodrigues","Canitar","Capão Bonito","Capela do Alto","Capivari","Caraguatatuba","Carapicuíba","Cardoso","Casa Branca","Cássia dos Coqueiros","Castilho","Catanduva","Catiguá","Cedral","Cerqueira César","Cerquilho","Cesário Lange","Charqueada","Chavantes","Clementina","Colina","Colômbia","Conchal","Conchas","Cordeirópolis","Coroados","Coronel Macedo","Corumbataí","Cosmópolis","Cosmorama","Cotia","Cravinhos","Cristais Paulista","Cruzália","Cruzeiro","Cubatão","Cunha","Descalvado","Diadema","Dirce Reis","Divinolândia","Dobrada","Dois Córregos","Dolcinópolis","Dourado","Dracena","Duartina","Dumont","Echaporã","Eldorado","Elias Fausto","Elisiário","Embaúba","Embu","Embu-Guaçu","Emilianópolis","Engenheiro Coelho","Espírito Santo do Pinhal","Espírito Santo do Turvo","Estiva Gerbi","Estrela d'Oeste","Estrela do Norte","Euclides da Cunha Paulista","Fartura","Fernando Prestes","Fernandópolis","Fernão","Ferraz de Vasconcelos","Flora Rica","Floreal","Florínia","Flórida Paulista","Franca","Francisco Morato","Franco da Rocha","Gabriel Monteiro","Gália","Garça","Gastão Vidigal","Gavião Peixoto","General Salgado","Getulina","Glicério","Guaiçara","Guaimbê","Guaíra","Guapiaçu","Guapiara","Guará","Guaraçaí","Guaraci","Guarani d'Oeste","Guarantã","Guararapes","Guararema","Guaratinguetá","Guareí","Guariba","Guarujá","Guarulhos","Guatapará","Guzolândia","Herculândia","Holambra","Hortolândia","Iacanga","Iacri","Iaras","Ibaté","Ibirá","Ibirarema","Ibitinga","Ibiúna","Icém","Iepê","Igaraçu do Tietê","Igarapava","Igaratá","Iguape","Ilha Comprida","Ilha Solteira","Ilhabela","Indaiatuba","Indiana","Indiaporã","Inúbia Paulista","Ipauçu","Iperó","Ipeúna","Ipiguá","Iporanga","Ipuã","Iracemápolis","Irapuã","Irapuru","Itaberá","Itaí","Itajobi","Itaju","Itanhaém","Itaóca","Itapecerica da Serra","Itapetininga","Itapeva","Itapevi","Itapira","Itapirapuã Paulista","Itápolis","Itaporanga","Itapuí","Itapura","Itaquaquecetuba","Itararé","Itariri","Itatiba","Itatinga","Itirapina","Itirapuã","Itobi","Itu","Itupeva","Ituverava","Jaborandi","Jaboticabal","Jacareí","Jaci","Jacupiranga","Jaguariúna","Jales","Jambeiro","Jandira","Jardinópolis","Jarinu","Jaú","Jeriquara","Joanópolis","João Ramalho","José Bonifácio","Júlio Mesquita","Jumirim","Jundiaí","Junqueirópolis","Juquiá","Juquitiba","Lagoinha","Laranjal Paulista","Lavínia","Lavrinhas","Leme","Lençóis Paulista","Limeira","Lindóia","Lins","Lorena","Lourdes","Louveira","Lucélia","Lucianópolis","Luís Antônio","Luiziânia","Lupércio","Lutécia","Macatuba","Macaubal","Macedônia","Magda","Mairinque","Mairiporã","Manduri","Marabá Paulista","Maracaí","Marapoama","Mariápolis","Marília","Marinópolis","Martinópolis","Matão","Mauá","Mendonça","Meridiano","Mesópolis","Miguelópolis","Mineiros do Tietê","Mira Estrela","Miracatu","Mirandópolis","Mirante do Paranapanema","Mirassol","Mirassolândia","Mococa","Mogi das Cruzes","Mogi-Guaçu","Mogi-Mirim","Mombuca","Monções","Mongaguá","Monte Alegre do Sul","Monte Alto","Monte Aprazível","Monte Azul Paulista","Monte Castelo","Monte Mor","Monteiro Lobato","Morro Agudo","Morungaba","Motuca","Murutinga do Sul","Nantes","Narandiba","Natividade da Serra","Nazaré Paulista","Neves Paulista","Nhandeara","Nipoã","Nova Aliança","Nova Campina","Nova Canaã Paulista","Nova Castilho","Nova Europa","Nova Granada","Nova Guataporanga","Nova Independência","Nova Luzitânia","Nova Odessa","Novais","Novo Horizonte","Nuporanga","Ocauçu","Óleo","Olímpia","Onda Verde","Oriente","Orindiúva","Orlândia","Osasco","Oscar Bressane","Osvaldo Cruz","Ourinhos","Ouro Verde","Ouroeste","Pacaembu","Palestina","Palmares Paulista","Palmeira d'Oeste","Palmital","Panorama","Paraguaçu Paulista","Paraibuna","Paraíso","Paranapanema","Paranapuã","Parapuã","Pardinho","Pariquera-Açu","Parisi","Patrocínio Paulista","Paulicéia","Paulínia","Paulistânia","Paulo de Faria","Pederneiras","Pedra Bela","Pedranópolis","Pedregulho","Pedreira","Pedrinhas Paulista","Pedro de Toledo","Penápolis","Pereira Barreto","Pereiras","Peruíbe","Piacatu","Piedade","Pilar do Sul","Pindamonhangaba","Pindorama","Pinhalzinho","Piquerobi","Piquete","Piracaia","Piracicaba","Piraju","Pirajuí","Pirangi","Pirapora do Bom Jesus","Pirapozinho","Pirassununga","Piratininga","Pitangueiras","Planalto","Platina","Poá","Poloni","Pompéia","Pongaí","Pontal","Pontalinda","Pontes Gestal","Populina","Porangaba","Porto Feliz","Porto Ferreira","Potim","Potirendaba","Pracinha","Pradópolis","Praia Grande","Pratânia","Presidente Alves","Presidente Bernardes","Presidente Epitácio","Presidente Prudente","Presidente Venceslau","Promissão","Quadra","Quatá","Queiroz","Queluz","Quintana","Rafard","Rancharia","Redenção da Serra","Regente Feijó","Reginópolis","Registro","Restinga","Ribeira","Ribeirão Bonito","Ribeirão Branco","Ribeirão Corrente","Ribeirão do Sul","Ribeirão dos Índios","Ribeirão Grande","Ribeirão Pires","Ribeirão Preto","Rifaina","Rincão","Rinópolis","Rio Claro","Rio das Pedras","Rio Grande da Serra","Riolândia","Riversul","Rosana","Roseira","Rubiácea","Rubinéia","Sabino","Sagres","Sales","Sales Oliveira","Salesópolis","Salmourão","Saltinho","Salto","Salto de Pirapora","Salto Grande","Sandovalina","Santa Adélia","Santa Albertina","Santa Bárbara d'Oeste","Santa Branca","Santa Clara d'Oeste","Santa Cruz da Conceição","Santa Cruz da Esperança","Santa Cruz das Palmeiras","Santa Cruz do Rio Pardo","Santa Ernestina","Santa Fé do Sul","Santa Gertrudes","Santa Isabel","Santa Lúcia","Santa Maria da Serra","Santa Mercedes","Santa Rita d'Oeste","Santa Rita do Passa Quatro","Santa Rosa de Viterbo","Santa Salete","Santana da Ponte Pensa","Santana de Parnaíba","Santo Anastácio","Santo André","Santo Antônio da Alegria","Santo Antônio de Posse","Santo Antônio do Aracanguá","Santo Antônio do Jardim","Santo Antônio do Pinhal","Santo Expedito","Santópolis do Aguapeí","Santos","São Bento do Sapucaí","São Bernardo do Campo","São Caetano do Sul","São Carlos","São Francisco","São João da Boa Vista","São João das Duas Pontes","São João de Iracema","São João do Pau d'Alho","São Joaquim da Barra","São José da Bela Vista","São José do Barreiro","São José do Rio Pardo","São José do Rio Preto","São José dos Campos","São Lourenço da Serra","São Luís do Paraitinga","São Manuel","São Miguel Arcanjo","São Paulo","São Pedro","São Pedro do Turvo","São Roque","São Sebastião","São Sebastião da Grama","São Simão","São Vicente","Sarapuí","Sarutaiá","Sebastianópolis do Sul","Serra Azul","Serra Negra","Serrana","Sertãozinho","Sete Barras","Severínia","Silveiras","Socorro","Sorocaba","Sud Mennucci","Sumaré","Suzanápolis","Suzano","Tabapuã","Tabatinga","Taboão da Serra","Taciba","Taguaí","Taiaçu","Taiúva","Tambaú","Tanabi","Tapiraí","Tapiratiba","Taquaral","Taquaritinga","Taquarituba","Taquarivaí","Tarabai","Tarumã","Tatuí","Taubaté","Tejupá","Teodoro Sampaio","Terra Roxa","Tietê","Timburi","Torre de Pedra","Torrinha","Trabiju","Tremembé","Três Fronteiras","Tuiuti","Tupã","Tupi Paulista","Turiúba","Turmalina","Ubarana","Ubatuba","Ubirajara","Uchoa","União Paulista","Urânia","Uru","Urupês","Valentim Gentil","Valinhos","Valparaíso","Vargem","Vargem Grande do Sul","Vargem Grande Paulista","Várzea Paulista","Vera Cruz","Vinhedo","Viradouro","Vista Alegre do Alto","Vitória Brasil","Votorantim","Votuporanga","Zacarias"]; 
		$("#text_0").autocomplete({source: alternativas});
	
	});

	function enviaDados(){
		var cidade = $("#text_0").val();
		var dias = selecionados['multipla_1'];
		var horas = selecionados['multipla_2'];

		// var sedas = sedas_selecionadas;  //todo: adaptar para slider vertical
		if(!cidade.trim()){
            //manda de volta pro slide
            setTimeout(function(){$('ul.slick-dots li:nth-child(2) button').trigger("click");},800);
            $("#tela_final h2").html("Preencha a cidade!");
		}else if(dias.length < 1){
            //manda de volta pro slide
            setTimeout(function(){$('ul.slick-dots li:nth-child(3) button').trigger("click");},800);
            $("#tela_final h2").html("Escolha pelo menos um dia!");
		}else if(horas.length < 1){
            //manda de volta pro slide
            setTimeout(function(){$('ul.slick-dots li:nth-child(4) button').trigger("click");},1000);
            $("#tela_final h2").html("Escolha a hora que dá mais fome!");
		}else{
          $("#tela_final h2").html("Enviando...");
          $.post( "insert.php", $("#formquiz").serialize(), function(data) {
            console.log(data);
            if(data == "erro") {
              $("#tela_final h2").html("Ocorreu um erro :(");
            } else {
              $("#tela_final h2").html("Gratidão!");
              $(".pisca-pisca").removeClass("pisca-pisca");

              $("#idQuiz").val(data);
              $(".enviandocoxinhas a").fadeIn(1000);

            }
          });
		}
	}

	var selecionados = new Array();

	function clickMultipla(id_ul, id_input, minima, maxima)
	{
		selecionados[id_ul] = new Array();
		if (id_ul === undefined) return false;;
		if (minima === undefined) minima = 0;
		if (maxima === undefined) maxima = 1;

		$("#"+id_ul+" li").click(function(){
			index_item = selecionados[id_ul].indexOf(this.id) 
			if(index_item < 0)
			{
				if(selecionados[id_ul].length >= maxima){
	    			$("#"+selecionados[id_ul][0]).removeClass("selected"); //tira a classe do primeiro elemento
	    			selecionados[id_ul].shift();
	    		}
	    		selecionados[id_ul].push(this.id);
	    		$(this).addClass("selected");
	    	}
	    	else
	    	{
    			$("#"+selecionados[id_ul][index_item]).removeClass("selected"); //tira a classe do primeiro elemento
    			selecionados[id_ul].splice(index_item,1);
    		}

            //Coloca os selecionados no input
            $("#"+id_input).val(selecionados[id_ul].join(","));
            
    		console.log($("#"+id_input).val());
    	});
	}
    
    var sedas_selecionadas = new Array();

    function clickSedas(id_input, minima, maxima)
	{
		if (minima === undefined) minima = 0;
		if (maxima === undefined) maxima = 1;

        
		$(".sedas_ul li").click(function(){    		

            if (this.id == "dont_smoke") {
                //Limpa todas as outras sedas (e deixa só essa selecionada depois)
                $(".sedas_ul li").removeClass("selected"); 
                sedas_selecionadas = new Array();
            } else {     
                //Limpa a dont_smoke da lista
                $("#dont_smoke").removeClass("selected");
                index_item = sedas_selecionadas.indexOf("dont_smoke");
    			sedas_selecionadas.splice(index_item,1);
            }
            
            //Testa se o item está no array
			index_item = sedas_selecionadas.indexOf(this.id);
            console.log(sedas_selecionadas);
                console.log(this.id+":"+index_item+" ");
            //Se não está, adiciona
			if(index_item < 0) 
			{
                //Caso tenha sido selecionado acima do máximo, remove o primeiro para ceder lugar ao novo
				if(sedas_selecionadas.length >= maxima){ 
	    			$("#"+sedas_selecionadas[0]).removeClass("selected"); //tira a classe do primeiro elemento
	    			sedas_selecionadas.shift();
	    		}
	    		sedas_selecionadas.push(this.id);
	    		$(this).addClass("selected");
	    	} else { //Se está no array, tira a classe e remove
    //			$("#"+sedas_selecionadas[index_item]).removeClass("selected"); //tira a classe do primeiro elemento
    //			sedas_selecionadas.splice(index_item,1);
    		}

            //Coloca os selecionados no input
            $("#"+id_input).val(sedas_selecionadas.join(","));
            
    	});
	}
    
    function clickSedas2(id_ul, id_input, minima, maxima)
	{
		selecionados[id_ul] = new Array();
		if (id_ul === undefined) return false;;
		if (minima === undefined) minima = 0;
		if (maxima === undefined) maxima = 1;
		$(".sedas_ul li").click(function(e){
            if (this.id == "dont_smoke") {
                //Limpa todas as outras sedas (e deixa só essa selecionada depois)
                $(".sedas_ul li").removeClass("selected"); 
                selecionados[id_ul] = new Array();
            } else {     
                index_item = selecionados[id_ul].indexOf("dont_smoke");                    
    			if(index_item >= 0) {                
                    //Limpa a dont_smoke da lista
                    $("#dont_smoke").removeClass("selected");
                    selecionados[id_ul] = new Array();
                    selecionados[id_ul].splice(index_item,1);
                }
            }
            
            //Caso tenha clicado no input, não faz nada
            if (this.id == "outra" && e.target.id == "outra_seda" ) {
                return;
            }
			index_item = selecionados[id_ul].indexOf(this.id) 
			if(index_item < 0)
			{
				if(selecionados[id_ul].length >= maxima){
	    			$("#"+selecionados[id_ul][0]).removeClass("selected"); //tira a classe do primeiro elemento
	    			selecionados[id_ul].shift();
	    		}
	    		selecionados[id_ul].push(this.id);
	    		$(this).addClass("selected");
	    	}
	    	else
	    	{
    			$("#"+selecionados[id_ul][index_item]).removeClass("selected"); //tira a classe do primeiro elemento
    			selecionados[id_ul].splice(index_item,1);
    		}

            //Coloca os selecionados no input
            $("#"+id_input).val(selecionados[id_ul].join(","));
            
    		console.log($("#"+id_input).val());
    	});
	}
    
	clickMultipla('multipla_1','multipla_1_hidden',1,7);
	clickMultipla('multipla_2','multipla_2_hidden',1,2);
	clickSedas2('sedas_ul','sedas_hidden',1,40); 
    $(".enviandocoxinhas a").hide();
    
</script>
        
<script type="text/javascript" src="inc/slick/slick.min.js"/></script>
      
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      logaApp();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      //document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      //document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
		window.location = "http://<?=$_SERVER['SERVER_NAME']?>/dev/420/site/site/home.php";
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '225836800874912',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  //Faz o login no PHP através do facebook + email
  function logaApp() {
    FB.api('/me', function(response) {
      var emailFb = response.email;
      var idFb = response.id;
      var nome = response.name;
      if (emailFb && idFb) {
          $.post("./salvapontos.php",{ emailFb: emailFb, idFb: idFb, nome:nome }, function( data ) {
          });
      }
    });
  }  
  function fb_login(){
      FB.login(function(response) {

          if (response.authResponse) {
              console.log('Welcome!  Fetching your information.... ');
              //console.log(response); // dump complete info
          
              logaApp();

          } else {
              //user hit cancel button
              console.log('User cancelled login or did not fully authorize.');

          }
      }, {
          scope: 'publish_stream,email'
      });
  }
  (function() {
      var e = document.createElement('script');
      e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
      e.async = true;
      document.getElementById('fb-root').appendChild(e);
  }());
</script>

</body>
</html>
