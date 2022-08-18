<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Features\Homepage\GetHomepageFeature;
use Illuminate\Http\Response;
use Lucid\Units\Controller;

class HomepageController extends Controller
{
    public function __invoke(): Response
    {
        return $this->serve(GetHomepageFeature::class);
    }
}
