<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domain\Blogging\Models\Post;
use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
//        if (app()->environment('local')) {
//            $this->call(
//                class: DefaultUserSeeder::class,
//            );
//        }
        $user = User::factory()->create([
            'first_name' => 'Steve',
            'last_name' => 'Chaudhary',
            'email' => 'bcoolboy8@gmail.com',
        ]);
        Post::factory(20)->for(
            $user
        )->create();
    }
}
