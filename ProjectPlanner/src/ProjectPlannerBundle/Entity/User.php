<?php
namespace ProjectPlannerBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use ProjectPlannerBundle;


/**
 * ProjectPlannerBundle\Entity\User
 * @ORM\Entity
 * @ORM\Table(name="fos_users")
 */
class User extends BaseUser
{
    /**
     * @ORM\ManyToMany(targetEntity="ProjectPlannerBundle\Entity\Project", inversedBy="fos_users")
     * @ORM\JoinTable(name="users_projects")
     */
    private $projects;


    /**
     * @ORM\OneToMany(targetEntity="ProjectPlannerBundle\Entity\Comment", mappedBy="fos_users")
     */
    private $comments;


    public function __construct(){
        parent::__construct();
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addComment(\ProjectPlannerBundle\Entity\Comment $comment){
        $this->comments[] = $comment;
        return $this;
    }

    public function removeComment(\ProjectPlannerBundle\Entity\Comment $comment){
        $this->users->removeElement($comment);
    }


    public function addProject(\ProjectPlannerBundle\Entity\Project $project){
        $this->projects[] = $project;
        return $this;
    }

    public function removeProject(\ProjectPlannerBundle\Entity\Project $project){
        $this->users->removeElement($project);

    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $description;


    /**
     * @return mixed
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description){
        $this->description = $description;
    }


}

