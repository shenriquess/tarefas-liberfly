<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Task::create([
                'titulo' => 'Tarefa ' . $i,
                'descricao' => 'Descrição da tarefa ' . $i,
                'prazo' => now()->addDays($i),
                'concluida' => false,
            ]);
        }
    }
}
