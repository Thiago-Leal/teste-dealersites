<?php

namespace App\Http\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function getBirthday()
    {
        if($this->birthday){
            return date("d/m/Y", strtotime($this->birthday));
        }
    }
}