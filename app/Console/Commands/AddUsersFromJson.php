<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Core\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AddUsersFromJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:users-from-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jsonPath = storage_path('json_file/users.json');
        $jsonContent = FacadesFile::get($jsonPath);
        $users = json_decode($jsonContent, true);

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name']['first'] . ' ' . $userData['name']['last'],
                'email' => $userData['email'],
                'password' => Hash::make($userData['login']['password']),
                'country' => $userData['location']['country'],
                'school_city' => $userData['location']['state'],
                'city' => $userData['location']['city'],
                'picture' => $userData['picture']['large'],
            ]);
        }

        $this->info('Users added from JSON successfully.');
    }
}