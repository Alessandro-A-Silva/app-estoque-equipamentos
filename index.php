<?php
    require_once "./util/Cpf.php";
    require_once "./util/Cnpj.php";
    require_once "./util/Telefone.php";
    require_once "./model/Setor.php";
    require_once "./model/Funcionario.php";
    require_once "./core/Database.php";
    require_once "./repository/SetorRepository.php";


    $setor = new Setor(2,"Segurança do trabalho","","");
    
    $setorRepository = new SetorRepository(Database::getConnection());
    
    // $id = $setorRepository->create($setor);

    $setorRepository->update($setor);

    $setorSelecionario = $setorRepository->findById(2);

    var_dump($setorSelecionario);

//    $setor = new Setor(0,"tecnologia da informação","","");

    

