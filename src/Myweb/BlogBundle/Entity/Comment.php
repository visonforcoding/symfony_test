<?php
namespace Myweb\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bg_comment")
 */
class Comment {

   /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
    /**
     * @ORM\Column(type="string",length= 255)
     * @var type 
     */
    protected $content;
    
    /**
     * @ORM\Column(type="datetime" , nullable = true)
     * @var type 
     */
    protected $cttime;
    
    public function getId(){
        return $this->id;
    }

        public function setContent($content){
        $this->content = $content;
    }
    
    public function getContent(){
       return  $this->content;
    }
    
    public function setCttime($cttime){
        $this->cttime = $cttime;
    }
    public function getCttime(){
        return $this->cttime;
    }

}
