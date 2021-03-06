<?php
/**
 * Created by PhpStorm.
 * User: x2UP_Media
 * Date: 10/17/17
 * Time: 3:23 AM
 */

namespace _2UpMedia\FreshbooksImporter\Commands;

use _2UpMedia\FreshbooksImporter\Importer\FreshbooksClassic;
use _2UpMedia\FreshbooksImporter\Service;
use _2UpMedia\FreshbooksImporter\Services\Freshbooks\ListTasks;
use Illuminate\Console\Command;

class ListTasksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'freshbooks-importer:list-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List Freshbooks Tasks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(FreshbooksClassic $freshbooksClassic, ListTasks $listTasks)
    {
        if (config('freshbooks-importer.freskbooks-version') === Service::VERSION_FRESHBOOKS) {
            $this->table($listTasks->headers(), $listTasks->rows());
        } else {
            $this->table($freshbooksClassic->listTasksHeaders(), $freshbooksClassic->listTasks());
        }
    }
}
