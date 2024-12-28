<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NextinnCRUD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'app:nextinnCRUD';
    protected $signature = 'nextinn:crud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create whole CRUD';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info(' Model created successfully.');
    }
}
