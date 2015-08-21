<?php

namespace ProjectPlannerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use DateTime


/**
 * ProjectPlannerBundle\Entity\Project
 * @ORM\Entity(repositoryClass="ProjectPlannerBundle\Entity\ProjectRepository")
 * @ORM\Table(name="projects")
 */
class Project
{

    /**
     * @ORM\ManyToMany(targetEntity="ProjectPlannerBundle\Entity\User")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="ProjectPlannerBundle\Entity\Issue", mappedBy="project")
     */
    private $issues;

    public function __construct(){
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->issues = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="members_id", type="integer")
     */
    private $membersId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="date")
     */
    private $deadline;

    /**
     * @var integer
     *
     * @ORM\Column(name="comments_id", type="integer")
     */
    private $commentsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="bug_id", type="integer", nullable=true)
     */
    private $bugId;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=true)
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
     * Set title
     *
     * @param string $title
     * @return Project
     */
    public function setTitle($title){
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Project
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
     * Set membersId
     *
     * @param integer $membersId
     * @return Project
     */
    public function setMembersId($membersId){
        $this->membersId = $membersId;

        return $this;
    }

    /**
     * Get membersId
     *
     * @return integer
     */
    public function getMembersId(){
        return $this->membersId;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     * @return Project
     */
    public function setDeadline($deadline){
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline(){
        return $this->deadline;
    }

    /**
     * Set commentsId
     *
     * @param integer $commentsId
     * @return Project
     */
    public function setCommentsId($commentsId){
        $this->commentsId = $commentsId;

        return $this;
    }

    /**
     * Get commentsId
     *
     * @return integer
     */
    public function getCommentsId(){
        return $this->commentsId;
    }

    /**
     * Set bugId
     *
     * @param integer $bugId
     * @return Project
     */
    public function setBugId($bugId){
        $this->bugId = $bugId;

        return $this;
    }

    /**
     * Get bugId
     *
     * @return integer
     */
    public function getBugId(){
        return $this->bugId;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Project
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

    public function addUser(\ProjectPlannerBundle\Entity\User $user){
        $this->users[] = $user;
        return $this;
    }

    public function getUsers(){
        return $this->users;
    }

    public function removeUser(\ProjectPlannerBundle\Entity\User $user){
        $this->users->removeElement($user);

    }

    public function isUserAssigned(User $user){

        foreach ($this->users as $searchedUser) {
            if ($user->getId() == $searchedUser->getId()) {
                return true;
            }
        }
        return false;
    }

    public function getIssues(){
        return $this->issues;
    }

    public function addIssue(Issue $issue){
        $this->issues[] = $issue;
        return $this;
    }

    public function removeIssue(Issue $issue){
        $this->issues->removeElement($issue);

    }
    public function countAssignedUsers(){
        return count($this->getUsers());
    }
    public function daysToDeadline(){
        $diff = date_diff(new \DateTime(), $this->getDeadline());
        return $diff->days;
    }

}

?>
