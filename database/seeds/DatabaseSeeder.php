<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeedUsersTable::class);
        $this->call(SeedAlbumTable::class);
        $this->call(SeedPhotoTable::class);
    }
}
