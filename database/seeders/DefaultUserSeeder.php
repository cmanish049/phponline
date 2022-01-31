<?php
declare(strict_types=1);
namespace Database\Seeders;

use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Manish',
            'last_name' => 'Chaudhary',
            'email' => 'cmanish049@gmail.com',
        ]);
    }
}
