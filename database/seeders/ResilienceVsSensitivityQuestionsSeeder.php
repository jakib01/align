<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResilienceVsSensitivityQuestionsSeeder extends Seeder
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
                'statement' => 'I prefer remaining calm and focused in high-pressure situations over expressing my emotions.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I enjoy finding solutions to problems rather than dwelling on setbacks.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I feel energised when I can maintain a sense of control in stressful circumstances.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prioritise staying productive, even during challenging times.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I thrive on maintaining stability and focus under pressure.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I value keeping a positive outlook more than openly discussing difficulties.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I focus on overcoming obstacles quickly rather than reflecting deeply on their impact.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I feel most effective when I bounce back quickly from disappointments.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prioritise staying composed and solution-oriented when challenges arise.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I find satisfaction in maintaining emotional stability during turbulent situations.',
                'strongly_agree_resilience' => 100, 'strongly_agree_sensitivity' => 0,
                'agree_resilience' => 75, 'agree_sensitivity' => 25,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 25, 'disagree_sensitivity' => 75,
                'strongly_disagree_resilience' => 0, 'strongly_disagree_sensitivity' => 100,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prefer acknowledging and processing emotions over quickly moving past challenges.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I value deeply understanding the emotional impact of work situations over staying detached.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I feel most authentic when I can express my emotions freely.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prioritise creating space to discuss feelings in the workplace.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I enjoy taking time to reflect on how events affect me and my team emotionally.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I focus on addressing the emotional aspects of challenges over practical solutions.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I feel more comfortable connecting with others through shared emotional experiences.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I thrive when I can validate others’ feelings and share my own.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I value being attuned to emotional undercurrents in the workplace.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'statement' => 'I prioritise emotional authenticity over maintaining a stoic or unaffected demeanour.',
                'strongly_agree_resilience' => 0, 'strongly_agree_sensitivity' => 100,
                'agree_resilience' => 25, 'agree_sensitivity' => 75,
                'neutral_resilience' => 50, 'neutral_sensitivity' => 50,
                'disagree_resilience' => 75, 'disagree_sensitivity' => 25,
                'strongly_disagree_resilience' => 100, 'strongly_disagree_sensitivity' => 0,
                'created_at' => now(), 'updated_at' => now()
            ],
        ];

        DB::table('resilience_vs_sensitivity_questions')->insert($questions);
    }
}
