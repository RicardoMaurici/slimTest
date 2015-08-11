<?php
    require 'vendor/autoload.php';
     
    $app = new \Slim\Slim(array(
        'templates.path' => 'templates'
    ));
     
    $app->get('/', function () use ($app){ 
        $data = array("data"=>array("Hello"=>"World!")); 
        //template file
        $app->render('default.php',$data,200); 
    }); 
     
    $app->group('/users',function() use ($app){
     
    //route to home
    $app->get('/',function() use ($app){
        //some users info
        $users = array(
            'users'=>array(
                'user1'=>'pw1',
                'user2'=>'pw2',
                'user3'=>'pw3',
                'user4'=>'pw4'
            )
        );
        $data = array(
            'data'=>$users
        );
        $app->render('default.php',$data,200);
    });
     
    //route to login
    $app->post('/login/',function() use ($app){
        if(isset($_POST))
        {
            $data = $_POST;
            $app->render('default.php',$data,200);
        }
        else
        {
            $app->render(404);
        }
    });
    }); 
    //run application
    $app->run();