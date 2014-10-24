<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace Myweb\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
 
  
    public function two(){
       $fhandle = fopen("D:/resource.txt",'a+');
       if($fhandle){
          if(fwrite($fhandle,  date("Y-m-d H:i:s")."我在测试\r\n")){
              echo "success";
          }else{
              
              echo "error！";
          }
           echo "yes";
       }else{
           echo "no";
       }
       exit();
    }
}
