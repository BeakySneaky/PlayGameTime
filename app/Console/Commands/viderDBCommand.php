<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;

class viderBDCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vider:bd {--D|donnees : Supprimer seulement les données}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vide la base de données de toutes ses tables';

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
        // vérifier si on est en mode débogage
        $environnement = config('app.env');

        if ($environnement != 'local') {
            exit('Cette commande ne peut être utilisée qu\'en mode développement (APP_ENV=local).' . PHP_EOL);
        }

        // vérifier si l'option a été utilisée
        $donneesSeulement = $this->option('donnees') == null ? false : true;

        // demander confirmation
        if ($donneesSeulement) {
            if (!$this->confirm('Désirez-vous vraiment VIDER toutes les tables de la base de données ?')) {
                exit('Commande annulée' . PHP_EOL);
            }
        } else {
            if (!$this->confirm('Désirez-vous vraiment SUPPRIMER toutes les tables de la base de données ?')) {
                exit('Commande annulée' . PHP_EOL);
            }
        }

        // ignorer les contraintes d'intégrité référentielle
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // retrouver la liste des tables
        $tables = DB::select('SHOW TABLES');

        if (!$donneesSeulement) {
            // détruire chacune des tables
            foreach ($tables as $tableStdClass) {
                foreach ($tableStdClass as $key => $table) {
                    DB::statement("DROP TABLE $table");
                }
            }
        } else {
            // vider chacune des tables
            foreach ($tables as $tableStdClass) {
                foreach ($tableStdClass as $key => $table) {
                    DB::table($table)->delete();
                }
            }
        }

        // réactiver les contraintes
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        // message de confirmation
        if ($donneesSeulement) {
            $this->info('Toutes les DONNÉES de la base de données ont été supprimées.');
        } else {
            $this->info('Toutes les TABLES de la base de données ont été supprimées.');
        }
    }
}