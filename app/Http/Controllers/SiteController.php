<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Front;
use App\Setting;

class SiteController extends Controller
{
    public $values = [];

    public function __construct()
    {
        $this->values['menu'] = Front::showInMenu();
        $this->values['setting']  = Setting::first();
    }

    public function __set($name, $value)
    {
        $this->values[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->values)) {
            return $this->values[$name];
        }

        return null;
    }

    public function __isset($name)
    {
        return isset($this->values[$name]);
    }

    public function __unset($name)
    {
        unset($this->values[$name]);
    }
}
