<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValueWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'Security' => ['Stability', 'Reliability', 'Predictability', 'Comfort', 'Risk Avoidance'],
            'Achievement' => ['Ambition', 'Success', 'Accomplishment', 'Recognition', 'Excellence'],
            'Universalism' => ['Equality', 'Justice', 'Protection', 'Fairness', 'Understanding'],
            'Benevolence' => ['Kindness', 'Care', 'Compassion', 'Generosity', 'Support'],
            'Conformity' => ['Obedience', 'Harmony', 'Structure', 'Order', 'Respect'],
            'Tradition' => ['Heritage', 'Customs', 'Rituals', 'Preservation', 'Lineage'],
            'Hedonism' => ['Pleasure', 'Fun', 'Playfulness', 'Enjoyment', 'Gratification'],
            'Power' => ['Authority', 'Influence', 'Leadership', 'Control', 'Status'],
            'Self-Direction' => ['Autonomy', 'Freedom', 'Independence', 'Individuality', 'Self-Expression'],
            'Stimulation' => ['Variety', 'Challenge', 'Adventure', 'Novelty', 'Excitement']
        ];

        foreach ($values as $mother => $children) {
            foreach ($children as $child) {
                DB::table('value_words')->insert([
                    'child_word' => $child,
                    'mother_word' => $mother,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
