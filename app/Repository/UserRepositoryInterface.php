<?php
namespace App\Repository;

use App\Models\admin\user;
use Illuminate\Support\Collection;
//(3)
interface UserRepositoryInterface
{
   public function all(): Collection;
}