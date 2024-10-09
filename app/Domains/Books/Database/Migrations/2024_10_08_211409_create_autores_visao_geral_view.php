<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::connection()->getDriverName() !== 'sqlite') {
            DB::statement("
                CREATE VIEW autores_visao_geral AS
                SELECT
                    a.CodAu,
                    a.Nome AS Autor,
                    COUNT(DISTINCT l.Codl) AS Qtd_Livros,
                    GROUP_CONCAT(DISTINCT l.Titulo ORDER BY l.Titulo ASC SEPARATOR ', ') AS Livros,
                    GROUP_CONCAT(DISTINCT assun.Descricao ORDER BY assun.Descricao ASC SEPARATOR ', ') AS Assuntos,
                    COUNT(DISTINCT assun.CodAs) AS Qtd_Assuntos
                FROM Autor a
                LEFT JOIN Livro_Autor la ON la.Autor_CodAu = a.CodAu
                LEFT JOIN Livro l ON l.Codl = la.Livro_Codl
                LEFT JOIN Livro_Assunto ls ON ls.Livro_Codl = l.Codl
                LEFT JOIN Assunto assun ON assun.CodAs = ls.Assunto_CodAs
                GROUP BY a.CodAu, a.Nome
                ORDER BY a.Nome ASC
            ");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::connection()->getDriverName() !== 'sqlite') {
            DB::statement("DROP VIEW IF EXISTS autores_visao_geral");
        }
    }
};
