<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RunSqlFile extends Command
{
    protected $signature = 'sql:run {file}';
    protected $description = 'Executa um arquivo SQL no banco de dados';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $filePath = $this->argument('file');

        if (File::exists($filePath)) {
            $sql = File::get($filePath);
            DB::unprepared($sql);
            $this->info('Arquivo SQL executado com sucesso!');
        } else {
            $this->error('Arquivo não encontrado!');
        }
    }
    
}
