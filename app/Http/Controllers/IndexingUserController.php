<?php

namespace App\Http\Controllers;

use App\Filters\GenderFilter;
use App\Filters\NameFilter;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class IndexingUserController
 * @package App\Http\Controllers
 * @author Ahmed Helal Ahmed
 */
class IndexingUserController extends Controller
{
    /**
     * @return JsonResource
     */
    public function __invoke(): JsonResource
    {
        $users = User::filter($this->getFilters(), request()->all())->get();

        return UserResource::collection($users);
    }

    /**
     * @return array []
     */
    private function getFilters(): array
    {
        return [
            'name' => new NameFilter(),
            'gender' => new GenderFilter(),
        ];
    }
}
