<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplineVsAdaptabilityQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $questions = [
    
                [
                    'statement' => 'I prefer following structured plans over adjusting to unexpected changes.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I value meeting deadlines consistently more than modifying priorities on the go.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I would rather complete tasks systematically than improvise under pressure.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I focus on maintaining order over embracing dynamic changes.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I prioritise sticking to plans over adapting them to new circumstances.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I feel more comfortable with predictability than flexibility.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I enjoy adhering to rules over bending them to meet unique challenges.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I prioritise long-term strategies over quick pivots to short-term needs.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I feel more confident working in stable environments than in fast-changing ones.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I prefer sticking to clear routines over exploring spontaneous alternatives.',
                    'strongly_agree_discipline' => 100, 'strongly_agree_adaptability' => 0,
                    'agree_discipline' => 75, 'agree_adaptability' => 25,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 25, 'disagree_adaptability' => 75,
                    'strongly_disagree_discipline' => 0, 'strongly_disagree_adaptability' => 100,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I focus more on adjusting to shifting demands than maintaining consistency.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I would rather take risks to innovate than focus on following guidelines.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I thrive in environments where expectations are unpredictable rather than stable.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I prefer reworking projects to address new input over staying the course.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I would rather try something untested than ensure a job is done as expected.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I enjoy environments where roles are fluid more than where structure is clear.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I feel more comfortable adjusting established procedures to fit new challenges than working with them as they are.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I prefer improvising solutions to unexpected issues over sticking to predefined methods.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I find satisfaction in adapting to evolving scenarios more than achieving planned goals.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                [
                    'statement' => 'I prioritise exploring unforeseen opportunities over steady progress.',
                    'strongly_agree_discipline' => 0, 'strongly_agree_adaptability' => 100,
                    'agree_discipline' => 25, 'agree_adaptability' => 75,
                    'neutral_discipline' => 50, 'neutral_adaptability' => 50,
                    'disagree_discipline' => 75, 'disagree_adaptability' => 25,
                    'strongly_disagree_discipline' => 100, 'strongly_disagree_adaptability' => 0,
                    'created_at' => now(), 'updated_at' => now()
                ],
                
                
                
                
            ];
    
            DB::table('discipline_vs_adaptability_questions')->insert($questions);
        }
    }
}
