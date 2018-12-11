<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates user';

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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $data['username'] = $this->ask('Username');
        $data['password'] = $this->secret('Password');
        $data['password_confirmation'] = $this->secret('Repeat password');

        $validator = Validator::make($data, [
            'username' => ['required', 'string', 'max:32', 'min:4', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $errors = $validator->errors();

        if (!$validator->fails()) {

            User::create([
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
            ]);
            $this->info('User created');

        }else{

            foreach ($errors->all() as $message) {
                $this->info($message);
            }
            $this->info('User was not created');

        }



    }
}
