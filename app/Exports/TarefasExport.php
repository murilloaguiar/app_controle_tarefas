<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        //return Tarefa::all();
        return auth()->user()->tarefas()->get(); //collection retornando apenas as tarefas do usuário 
    }

    public function headings():array{
        return ['Id tarefa','Tarefa','Data limite','Coluna teste', 'Coluna teste'];
    }

    //recebe um parâmetro que contém todas as informações por linha. Definindo o que será exibido e fazendo alterações linha a linha 
    public function map($linha):array{
        //dd($linha);

        return [
            $linha->id,
            $linha->tarefa,
            date('d/m/Y', strtotime($linha->data_limite_conclusao)),
            'valor x',
            'valor x',
        ];
    }
}
