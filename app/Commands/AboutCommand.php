<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use function Termwind\{render};
use App\Core\Webzone;

class AboutCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'about';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'whole credits of team';
    
    
    public function __construct()
    {
    	parent::__construct();
        $this->webzone = new Webzone();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	//show app logo.
    	$this->webzone->logo();
    
        //show app version.
    	$this->comment(' ' . app('git.version'));
    
        $this->newLine()->info('Termux Webzone is a CLI application which provides a ton of features for web developers to build, run and test their php applications within the limits of android. The application is designed only to work with Termux.');
        
        $this->newLine()->comment('  github: https://github.com/albinvar/termux-webzone');
        
        $this->credits();
    }
    
    public function credits(): void
    {
    	$this->newLine();
    
	    //create a basic table and output tne values as a table.
        $headers = ['Developers', 'role'];
        $data = [
            ['Albin', 'Developer'],
        ];
        $this->table($headers, $data);
        
        render(<<<'HTML'
            <div class="py-1 ml-2">
                <div class="px-1 bg-blue-300 text-black">Laravel Zero</div>
                <em class="ml-1">
                  Simplicity is the ultimate sophistication.
                </em>
            </div>
        HTML);
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule)
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
