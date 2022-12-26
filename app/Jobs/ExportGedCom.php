<?php

namespace App\Jobs;


use App\Tenant\Manager;
//use Auth;
//use Illuminate\Support\Facades\Auth;
use FamilyTree365\LaravelGedcom\Utils\GedcomGenerator;
use File;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExportGedCom implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    protected User $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user,$file)
    {
        $this->file = $file;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $p_id = 1;
        $f_id = 0;
        $up_nest = 3;
        $down_nest = 3;
        //Tenant database connection
        if (!$this->user->isAdmin()) {
            $tenant = Manager::fromModel($this->user->company(), $this->user)->connect(true);
//            \Log::debug($this->user->company());
        }
        //Tenant database connection
        $writer = new GedcomGenerator($p_id, $f_id, $up_nest, $down_nest);
        $content = $writer->getGedcomPerson();
        $destinationPath = storage_path('public/upload/');

        // if (! is_dir($destinationPath)) {
        //     mkdir($destinationPath, 0777, true);
        // }

        \Storage::disk('public')->put($this->file, $content);
        if (!$this->user->isAdmin()) {
            $tenant->disconnect();
        }
    }
}
