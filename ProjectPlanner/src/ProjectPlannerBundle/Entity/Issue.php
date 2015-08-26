<?php

namespace ProjectPlannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Issue
 *
 * @ORM\Table(name="issues")
 * @ORM\Entity(repositoryClass="ProjectPlannerBundle\Entity\IssueRepository")
 */
class Issue
{
    /**
     * @ORM\OneToMany(targetEntity="ProjectPlannerBundle\Entity\Comment", mappedBy="issue")
     */
    private $comments;

    public function __construct(){
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="issues")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started", type="datetime")
     */
    private $started;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="resolved_at", type="datetime")
     */
    private $resolvedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Issue
     */
    public function setName($name){
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Issue
     */
    public function setDescription($description){
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * Set started
     *
     * @param \DateTime $started
     * @return Issue
     */
    public function setStarted($started){
        $this->started = $started;

        return $this;
    }

    /**
     * Get started
     *
     * @return \DateTime
     */
    public function getStarted(){
        return $this->started;
    }

    /**
     * Set resolvedAt
     *
     * @param \DateTime $resolvedAt
     * @return Issue
     */
    public function setResolvedAt($resolvedAt){
        $this->resolvedAt = $resolvedAt;

        return $this;
    }

    /**
     * Get resolvedAt
     *
     * @return \DateTime
     */
    public function getResolvedAt(){
        return $this->resolvedAt;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Issue
     */
    public function setStatus($status){
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus(){
        return $this->status;
    }

    /**
     * Set project
     *
     * @return string
     */
    public function setProject($project){
        $this->project = $project;

        return $this;
    }

    public function getProject(){
        return $this->project;
    }

    public function getComments(){
        return $this->comments;
    }

    public function addComment(Comment $comment){
        $this->comments[] = $comment;
        return $this;
    }

    public function removeComment(Comment $comment){
        $this->issues->removeElement($comment);

    }


}
