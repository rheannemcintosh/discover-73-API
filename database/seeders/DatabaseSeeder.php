<?php

namespace Database\Seeders;

use Database\Seeders\custom\ActivityGroupSeeder;
use Database\Seeders\custom\ActivitySeeder;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    private array $customSeeders = [
        'database/seeders/custom/ActivityGroupSeeder.php' => ActivityGroupSeeder::class,
        'database/seeders/custom/ActivitySeeder.php'      => ActivitySeeder::class,
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([]);

        foreach ($this->customSeeders as $file => $seederClass) {
            if (file_exists($file)) {
                $this->call($seederClass);
            }
        }
    }
}
