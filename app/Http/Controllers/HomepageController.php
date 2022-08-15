<?php

namespace App\Http\Controllers;

use App\Features\Homepage\GetHomepageFeature;
use Lucid\Units\Controller;

class HomepageController extends Controller
{
    public function __invoke()
    {
        return $this->serve(GetHomepageFeature::class);
    }
}
