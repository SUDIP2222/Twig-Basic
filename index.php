<?php

    /**
     * Created by PhpStorm.
     * User: sudip sarker
     * Date: 1/1/2016
     * Time: 1:41 AM
     */


      require "vendor/autoload.php";

      $loader=new Twig_Loader_Filesystem('views');
      $twig=new Twig_Environment($loader);

      $md5Filter = new Twig_SimpleFilter('md5',function($string){

          return md5($string);

      });

      $twig->addFilter($md5Filter);

      $lexer =new Twig_Lexer($twig,array(

          'tag_block' => array('{','}'),
          'tag_variable' => array('{{','}}')

      ));

      $twig->setLexer($lexer);

      echo $twig->render('hello.html', array(
              'name' => 'Sudip Sarker',
              'age' => 20,

              'users' => array(
                  array('name' => 'Rony' , 'age'=>23),
                  array('name' => 'Rabbir' , 'age'=>20),
                  array('name' => 'parvez' , 'age'=>18),
              )
           ));