<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuriosityVsPracticalityQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'statement' => 'I prefer exploring new methods over relying on tried-and-true processes.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I enjoy experimenting with creative ideas more than focusing on practical implementation.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I value innovation over ensuring efficiency in routine tasks.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prioritise brainstorming bold solutions over refining current systems.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I feel more energised by discovering possibilities than by meeting immediate goals.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I enjoy envisioning future strategies more than addressing present needs.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I would rather learn through trial and error than apply proven approaches.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I focus more on imagining what could be than on improving what already works.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prefer diving into uncharted territory over staying within familiar frameworks.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I thrive on generating fresh ideas rather than executing dependable plans.',
                'strongly_agree_curiosity' => 100, 'strongly_agree_practicality' => 0,
                'agree_curiosity' => 75, 'agree_practicality' => 25,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 25, 'disagree_practicality' => 75,
                'strongly_disagree_curiosity' => 0, 'strongly_disagree_practicality' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prefer managing immediate outcomes over pursuing long-term insights.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I value asking "how" and "when" more than "why" and "what if."',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I would rather ensure the task is completed quickly than invest time exploring options.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prioritise procedural reliability over intellectual curiosity.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I feel more satisfaction from delivering predictable results than from innovation.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I enjoy solving tangible problems more than working with abstract concepts.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I focus on optimising present-day efficiencies more than imagining future scenarios.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I would rather confirm current practices than challenge assumptions.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I find satisfaction in ensuring standardisation over challenging conventions.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I feel inspired by resolving the known more than exploring unknowns.',
                'strongly_agree_curiosity' => 0, 'strongly_agree_practicality' => 100,
                'agree_curiosity' => 25, 'agree_practicality' => 75,
                'neutral_curiosity' => 50, 'neutral_practicality' => 50,
                'disagree_curiosity' => 75, 'disagree_practicality' => 25,
                'strongly_disagree_curiosity' => 100, 'strongly_disagree_practicality' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
        ];

        DB::table('curiosity_vs_practicality_questions')->insert($questions);
    }
}
