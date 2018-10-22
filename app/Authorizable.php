<?php

namespace App;

trait Authorizable
{
    private $abilities = [
        'edit' => 'Edit',
        'update' => 'Edit',
        'index' => 'Show',
        'show' => 'Show',
        'create' => 'Add',
        'store' => 'Add',
        'destroy' => 'Delete'
    ];
    /**
    * Override of callAction to perform the authorization before
    *
    * @param $method
    * @param $parameters
    * @return mixed
    */

    public function setAbilities($abilities)
    {
        $this->abilities = $abilities;
    }

    public function callAction($method, $parameters)
    {
        $ability = $this->getAbility($method);
        if(!is_null($ability) && !userCan($ability)) {
            return redirect(aurl('/'))->with([
                'message' => 'You Have No Permission',
            ]);
        }

        return parent::callAction($method, $parameters);
    }

    public function getAbility($method)
    {
        $routeName = explode('.', \Request::route()->getName());
        $action = array_get($this->getAbilities(), $method);
        return $action ? $action . ' ' . ucfirst($routeName[0]) : null;
    }

    private function getAbilities()
    {
        return $this->abilities;
    }
}
