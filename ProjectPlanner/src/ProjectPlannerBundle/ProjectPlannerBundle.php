<?php

namespace ProjectPlannerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProjectPlannerBundle extends Bundle
{
    public function getParent(){
        return 'FOSUserBundle';
    }
}
