<?php
namespace ProjectPlannerBundle\Security\Authorization\Voter;

use Symfony\Component\Security\Core\Authorization\Voter\AbstractVoter;
use Symfony\Component\Security\Core\User\UserInterface;

class ProjectVoter extends AbstractVoter
{
    const VIEW = 'view';
    const EDIT = 'edit';

    protected function getSupportedAttributes(){
        return array(self::VIEW, self::EDIT);
    }

    protected function getSupportedClasses(){
        return array('ProjectPlannerBundle/Entity/Project');
    }

    protected function isGranted($attribute, $project, $user = null){
        // make sure there is a user object (i.e. that the user is logged in)
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
            case self::VIEW:
                // the data object could have for example a method isPrivate()
                // which checks the Boolean attribute $private
                if ($project->isUserAsigned($this->getUser())) {
                    return true;
                }

                break;
            case self::EDIT:
                // we assume that our data object has a method getOwner() to
                // get the current owner user entity for this data object
//                if ($user->getId() === $post->getOwner()->getId()) {
//                    return true;
//                }
                return true;
                break;

                return false;
        }
    }
}