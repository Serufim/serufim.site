<?php

namespace App\Console\Commands;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class add_admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:admin {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add Administrator';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');
        $user = User::create([
            'name' => 'Serufim',
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $user->save();
        $this->info('Done');
    }
}
