<?php


namespace Lvlo\Autoremove\Commands;


use Illuminate\Console\Command;
use Lvlo\Autoremove\Models\AutoremoveCorporation;
use Seat\Eveapi\Models\Character\CharacterInfo;

class Autoremove extends Command
{
    protected $signature = "autoremove:users {--dry-run}";

    protected $description = "Autoremove users";

    public function handle()
    {
        $dryRun = $this->option("dry-run");
        $ids = $this->getCorporationsIds();

        $characters = CharacterInfo::all();

        foreach($characters as $character) {
            $corporation = $character->corporation();
            if(!is_object($corporation)) {
                if(!$dryRun) {
                    $character->delete();
                } else {
                    $this->info(sprintf("Removing character %s", $character->name));
                }
                continue;
            }
            if(!in_array(intval($corporation->corporation_id), $ids)){
                if(!$dryRun) {
                    $character->delete();
                } else {
                    $this->info(sprintf("Removing character %s", $character->name));
                }
            }
        }
    }

    private function getCorporationsIds()
    {
        $corporations = AutoremoveCorporation::all();
        $ids = [];
        foreach($corporations as $corporation) {
            $ids[] = intval($corporation->corporation_id);
        }

        return $ids;
    }
}