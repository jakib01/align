<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            1 => ['Variety', 'Stability', 'Ambition', 'Equality', 'Kindness', 'Obedience', 'Heritage', 'Pleasure', 'Authority', 'Autonomy'],
            2 => ['Freedom', 'Challenge', 'Reliability', 'Success', 'Justice', 'Care', 'Harmony', 'Customs', 'Fun', 'Influence'],
            3 => ['Leadership', 'Independence', 'Adventure', 'Predictability', 'Accomplishment', 'Protection', 'Compassion', 'Structure', 'Rituals', 'Playfulness'],
            4 => ['Enjoyment', 'Control', 'Individuality', 'Novelty', 'Comfort', 'Recognition', 'Fairness', 'Generosity', 'Order', 'Preservation'],
            5 => ['Lineage', 'Gratification', 'Status', 'Self-Expression', 'Excitement', 'Risk Avoidance', 'Excellence', 'Understanding', 'Support', 'Respect'],
        ];

        foreach ($pages as $page => $words) {
            foreach ($words as $word) {
                DB::table('quiz_pages')->insert([
                    'page' => $page,
                    'word' => $word,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
