<?php

namespace FactoryCms\FactoryCms\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class EasyInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'easy:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init easy cms';

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
     * @return int
     */
    public function handle()
    {
        File::copy(__DIR__ . '/../Config/easy.php', config_path('easy.php'));

        return 0;
    }
}
