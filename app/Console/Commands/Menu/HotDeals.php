<?php

namespace App\Console\Commands\Menu;

use Illuminate\Console\Command;

class HotDeals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:hot-deals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add menu for hot-deals';

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
        $this->info('Start ' . $this->description);
        $menu = \DB::table('menus')
            ->where('name', 'Hot Deals')
            ->where('route', 'hot-deals')
            ->first();

        if ($menu) {
            $this->info('Menu already exists');
            return;
        }

        \DB::table('menus')->insert([
            'parent_id' => null,
            'name' => 'Hot Deals',
            'type' => 'menu',
            'classification' => 'Featured',
            'icon' => 'bi-tags',
            'route' => 'hot-deals.index',
            'classification_order' => 2,
            'classification_inner_order' => 3,
        ]);
        $this->info('Successfully ' . $this->description);
    }
}
