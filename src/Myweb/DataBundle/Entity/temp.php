<?php

namespace Myweb\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * temp
 * @ORM\Entity
 * @ORM\Table(name="temp")
 */
class temp
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     */
    private $pwd;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $cttime;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     */
    private $hobby;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return temp
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set pwd
     *
     * @param string $pwd
     * @return temp
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    
        return $this;
    }

    /**
     * Get pwd
     *
     * @return string 
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set cttime
     *
     * @param \DateTime $cttime
     * @return temp
     */
    public function setCttime($cttime)
    {
        $this->cttime = $cttime;
    
        return $this;
    }

    /**
     * Get cttime
     *
     * @return \DateTime 
     */
    public function getCttime()
    {
        return $this->cttime;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return temp
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return temp
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set hobby
     *
     * @param string $hobby
     * @return temp
     */
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;
    
        return $this;
    }

    /**
     * Get hobby
     *
     * @return string 
     */
    public function getHobby()
    {
        return $this->hobby;
    }
}
