<?php

namespace ProjectPlannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="ProjectPlannerBundle\Entity\CommentRepository")
 */
class Comment
{
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Issue", inversedBy="comments")
     * @ORM\JoinColumn(name="issue_id", referencedColumnName="id")
     */
    private $issue;

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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @var text
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Set user
     *
     * @param string $userId
     * @return Comments
     */
    public function setUser($user){
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser(){
        return $this->user;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Comments
     */
    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt(){
        return $this->createdAt;
    }

    /**
     * Set project
     *
     * @param integer $projectId
     * @return Comments
     */
    public function setProject($project){
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return integer
     */
    public function getProject(){
        return $this->project;
    }

    /**
     * Set issue
     *
     * @return Comments
     */
    public function setIssue($issue){
        $this->issue = $issue;

        return $this;
    }

    /**
     * Get issue
     *
     */
    public function getIssue(){
        return $this->issue;
    }

    /**
     * Set text
     *
     * @param text $text
     * @return Comments
     */
    public function setText($text){
        $this->text = $text;
        return $text;
    }

    /**
     * Get text
     *
     * @return text
     */
    public function getText(){
        return $this->text;
    }

}
