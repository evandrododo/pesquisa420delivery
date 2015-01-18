<?php
session_start();
  $idQuiz = $_REQUEST['idQuiz'];
  if($_REQUEST["emailFb"]) {
    require_once "../../site/entitymanager.php";

    $idFb = $_REQUEST['idFb'];
    $email = $_REQUEST['emailFb'];
    $nome = $_REQUEST['nome'];

    $Usuario  = $entityManager->getRepository('Usuario')->findOneBy(array('email' => $email));
    //Caso exista o usuário ele pega os dados, caso contrário vai cadastrar um novo
    if($Usuario) {            
      //Pega dados do usuário para salvar na sessão
      $idUsuario = $Usuario->getId();
      $nomeCompleto = $Usuario->getNomeCompleto();
      $nomes = explode(" ",$nomeCompleto);
      $nomeUsuario = $nomes[0];
      $pontosUsuario = $Usuario->getPontos();
      if(!$pontosUsuario) $pontosUsuario = "0";

      $facebookId = $Usuario->getFacebookId();
      if($facebookId == $idFb) {
        //Salva os pontos e o quiz
        $pontos = $Usuario->getPontos();
        $Usuario->setPontos($pontos+10);
        $Usuario->setQuiz();
        $_SESSION['idUsuario'] = $idUsuario;
        $_SESSION['nomeUsuario'] = $nomeUsuario;
        $_SESSION['pontosUsuario'] = $pontosUsuario;
        return "success";
      } else {
        $erro = 401;
      }
    }else{
      //Cadastra um novo usuário
      $Usuario = new Usuario();
      $Usuario->setNomeCompleto($nome);
      $Usuario->setFacebookId($idFb);
      $Usuario->setEmail($email);

      $entityManager->persist($Usuario); //persistencia (caso dê merda ele mantém os dados salvos)
      $entityManager->flush(); //salva no bd
      return "success";
    }

    if($erro == 401) {
    return "401";
    }

  }