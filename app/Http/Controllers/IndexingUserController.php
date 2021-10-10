<?php

namespace App\Http\Controllers;

use App\Filters\GenderFilter;
use App\Filters\NameFilter;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Sorts\RoleTitleSorter;
use App\Sorts\SerialSorter;
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
        $users = User::filter(
            $this->getFilters(),
            request()->all()
        )->sorter(
            $this->getSorters(),
            request()->all()
        )
            ->with('role')
            ->get();

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

    /**
     * @return array []
     */
    private function getSorters(): array
    {
        return [
            'serial' => new SerialSorter(),
            'role_name' => new RoleTitleSorter()
        ];
    }
}
