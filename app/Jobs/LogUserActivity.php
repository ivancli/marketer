<?php

namespace App\Jobs;

use App\Contracts\UserManagement\UserActivityContract;
use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class LogUserActivity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $module;
    protected $action;

    /**
     * Create a new job instance.
     * @param User $user
     * @param null $module
     * @param null $action
     */
    public function __construct(User $user, $module = null, $action = null)
    {
        $this->user = $user;
        $this->module = $module;
        $this->action = $action;
    }

    /**
     * Execute the job.
     *
     * @param UserActivityContract $userActivityRepo
     * @param DB $db
     * @return void
     * @throws Exception
     */
    public function handle(UserActivityContract $userActivityRepo)
    {
        DB::beginTransaction();

        try {

            $userActivity = $userActivityRepo->store([
                'module' => $this->module,
                'action' => $this->action,
            ]);
            $userActivityRepo->attachUser($userActivity, $this->user);

        } catch (Exception $exception) {

            DB::rollback();
            throw $exception;

        }

        DB::commit();
    }
}
