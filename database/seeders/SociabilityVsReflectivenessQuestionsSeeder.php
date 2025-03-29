<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SociabilityVsReflectivenessQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [ [
            'statement' => 'I prefer collaborating in group discussions over working alone on tasks.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I thrive on building relationships with team members to foster a positive work environment.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I feel energised by spending time networking with colleagues.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I enjoy sharing ideas with others more than working independently on them.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I prioritise communicating regularly with teammates to maintain strong connections.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I prefer resolving challenges through collaborative brainstorming rather than individual problem-solving.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I enjoy lively discussions at work over quiet, reflective moments.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I focus on fostering connections within the team to enhance productivity.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I value team bonding activities that strengthen relationships.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I feel more productive when interacting with colleagues frequently.',
            'strongly_agree_sociability' => 100,
            'strongly_agree_reflectiveness' => 0,
            'agree_sociability' => 75,
            'agree_reflectiveness' => 25,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 25,
            'disagree_reflectiveness' => 75,
            'strongly_disagree_sociability' => 0,
            'strongly_disagree_reflectiveness' => 100,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I prefer spending time thinking through solutions independently before sharing them.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I feel most effective when analysing past successes and failures on my own.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I value taking time to reflect on work outcomes to make improvements.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I enjoy developing ideas in solitude before discussing them with others.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I prioritise introspection over frequent collaboration.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I feel more comfortable working on tasks where I can focus without interruptions.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I value time spent evaluating my performance over group feedback sessions.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I find fulfilment in deeply considering strategic decisions before acting on them.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I focus on understanding complex problems on my own rather than relying on group input.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'statement' => 'I enjoy quiet, thoughtful analysis over dynamic team interactions.',
            'strongly_agree_sociability' => 0,
            'strongly_agree_reflectiveness' => 100,
            'agree_sociability' => 25,
            'agree_reflectiveness' => 75,
            'neutral_sociability' => 50,
            'neutral_reflectiveness' => 50,
            'disagree_sociability' => 75,
            'disagree_reflectiveness' => 25,
            'strongly_disagree_sociability' => 100,
            'strongly_disagree_reflectiveness' => 0,
            'created_at' => now(), 'updated_at' => now()
        ], 
    ];
        DB::table('sociability_vs_reflectiveness_questions')->insert($questions);
    }
}
