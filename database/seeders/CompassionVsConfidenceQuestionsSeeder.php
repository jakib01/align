<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompassionVsConfidenceQuestionsSeeder extends Seeder
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
                'statement' => 'I prefer focusing on building strong relationships with colleagues over asserting my ideas.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I feel most fulfilled when I can support others during challenging times.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I value creating a harmonious workplace more than influencing key decisions.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I prioritise understanding others’ perspectives over driving outcomes.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I enjoy helping others feel valued more than being the centre of attention.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I focus on creating a supportive environment for team members to succeed.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I find satisfaction in addressing others’ needs rather than promoting my own ideas.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I prioritise fostering kindness in the workplace over advocating for bold changes.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I enjoy ensuring that others feel heard and included.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I focus more on collaboration and empathy than on leading decisively.',
                'strongly_agree_compassion' => 100, 'strongly_agree_confidence' => 0,
                'agree_compassion' => 75, 'agree_confidence' => 25,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 25, 'disagree_confidence' => 75,
                'strongly_disagree_compassion' => 0, 'strongly_disagree_confidence' => 100
            ],
            [
                'statement' => 'I prefer taking charge of situations to achieve desired outcomes.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I feel more comfortable making assertive decisions than prioritising group harmony.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I value promoting my ideas over focusing on others’ emotional needs.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I thrive on influencing others to achieve ambitious goals.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I enjoy taking the lead in group settings to ensure objectives are met.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I prioritise confidently presenting my views over accommodating differing opinions.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I focus on achieving bold results more than maintaining peace within the team.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I feel energised by opportunities to stand out and lead discussions.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I value setting a clear direction for the team over ensuring emotional support.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ],
            [
                'statement' => 'I find satisfaction in driving innovation and progress over addressing interpersonal concerns.',
                'strongly_agree_compassion' => 0, 'strongly_agree_confidence' => 100,
                'agree_compassion' => 25, 'agree_confidence' => 75,
                'neutral_compassion' => 50, 'neutral_confidence' => 50,
                'disagree_compassion' => 75, 'disagree_confidence' => 25,
                'strongly_disagree_compassion' => 100, 'strongly_disagree_confidence' => 0
            ]
        ];
       
        DB::table('compassion_vs_confidence_questions')->insert($questions);
    }
}
