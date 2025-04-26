<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoreSkillQuestionsSeeder extends Seeder
{
    public function run()
    {
        $questions = [
           
            [
                'prompt' => "A colleague strongly recommends a candidate who doesn’t meet the role’s requirements. You’re unsure.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Bias Management",
                'theme_tags' => "bias, objectivity, decision making",
                'options' => json_encode([
                    "A" => ["text" => "Reject the candidate despite the recommendation", "score" => 2],
                    "B" => ["text" => "Shortlist the candidate to keep your colleague happy", "score" => 0],
                    "C" => ["text" => "Evaluate the candidate independently and make your own judgment", "score" => 3],
                    "D" => ["text" => "Ask the client to assess the candidate directly", "score" => 1]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "You find a strong candidate, but they haven’t completed the mandatory application form.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Process Adherence",
                'theme_tags' => "process, rules, consistency",
                'options' => json_encode([
                    "A" => ["text" => "Move forward without the form", "score" => 0],
                    "B" => ["text" => "Ask them to complete the form before proceeding", "score" => 3],
                    "C" => ["text" => "Fill the form on their behalf based on their CV", "score" => 1],
                    "D" => ["text" => "Submit the CV to the client anyway", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "You have five candidates to screen today and limited time. One hasn’t confirmed their availability.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Time Management",
                'theme_tags' => "scheduling, priorities, responsiveness",
                'options' => json_encode([
                    "A" => ["text" => "Call them anyway and hope they answer", "score" => 1],
                    "B" => ["text" => "Prioritise the four who confirmed", "score" => 3],
                    "C" => ["text" => "Reschedule everyone to accommodate all", "score" => 0],
                    "D" => ["text" => "Email the fifth candidate and continue with your plan", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "A candidate is clearly overqualified for a junior role but insists they want to apply. What do you do?",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Role Fit Judgement",
                'theme_tags' => "role fit, overqualification, seniority",
                'options' => json_encode([
                    "A" => ["text" => "Question their intentions and reject them", "score" => 1],
                    "B" => ["text" => "Ask them about their career goals and reasons for interest", "score" => 3],
                    "C" => ["text" => "Move them forward due to their impressive background", "score" => 2],
                    "D" => ["text" => "Recommend a more senior role to them immediately", "score" => 0]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "You notice two CVs from the same candidate with different job titles for the same time period.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Ethical Evaluation",
                'theme_tags' => "ethics, integrity, fraud detection",
                'options' => json_encode([
                    "A" => ["text" => "Reject the candidate for dishonesty", "score" => 1],
                    "B" => ["text" => "Confront them directly and ask for an explanation", "score" => 3],
                    "C" => ["text" => "Ignore it and choose the stronger version", "score" => 0],
                    "D" => ["text" => "Ask a colleague to follow up instead", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'prompt' => "A colleague strongly recommends a candidate who doesn’t meet the role’s requirements. You’re unsure.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Bias Management",
                'theme_tags' => "bias, objectivity, decision making",
                'options' => json_encode([
                    "A" => ["text" => "Reject the candidate despite the recommendation", "score" => 2],
                    "B" => ["text" => "Shortlist the candidate to keep your colleague happy", "score" => 0],
                    "C" => ["text" => "Evaluate the candidate independently and make your own judgment", "score" => 3],
                    "D" => ["text" => "Ask the client to assess the candidate directly", "score" => 1]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "You find a strong candidate, but they haven’t completed the mandatory application form.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Process Adherence",
                'theme_tags' => "process, rules, consistency",
                'options' => json_encode([
                    "A" => ["text" => "Move forward without the form", "score" => 0],
                    "B" => ["text" => "Ask them to complete the form before proceeding", "score" => 3],
                    "C" => ["text" => "Fill the form on their behalf based on their CV", "score" => 1],
                    "D" => ["text" => "Submit the CV to the client anyway", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "You have five candidates to screen today and limited time. One hasn’t confirmed their availability.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Time Management",
                'theme_tags' => "scheduling, priorities, responsiveness",
                'options' => json_encode([
                    "A" => ["text" => "Call them anyway and hope they answer", "score" => 1],
                    "B" => ["text" => "Prioritise the four who confirmed", "score" => 3],
                    "C" => ["text" => "Reschedule everyone to accommodate all", "score" => 0],
                    "D" => ["text" => "Email the fifth candidate and continue with your plan", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "A candidate is clearly overqualified for a junior role but insists they want to apply. What do you do?",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Role Fit Judgement",
                'theme_tags' => "role fit, overqualification, seniority",
                'options' => json_encode([
                    "A" => ["text" => "Question their intentions and reject them", "score" => 1],
                    "B" => ["text" => "Ask them about their career goals and reasons for interest", "score" => 3],
                    "C" => ["text" => "Move them forward due to their impressive background", "score" => 2],
                    "D" => ["text" => "Recommend a more senior role to them immediately", "score" => 0]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "You notice two CVs from the same candidate with different job titles for the same time period.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Ethical Evaluation",
                'theme_tags' => "ethics, integrity, fraud detection",
                'options' => json_encode([
                    "A" => ["text" => "Reject the candidate for dishonesty", "score" => 1],
                    "B" => ["text" => "Confront them directly and ask for an explanation", "score" => 3],
                    "C" => ["text" => "Ignore it and choose the stronger version", "score" => 0],
                    "D" => ["text" => "Ask a colleague to follow up instead", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            

            [
                'prompt' => "A strong candidate has a two-year employment gap without explanation. What’s your move?",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Handling Gaps",
                'theme_tags' => "employment gaps, empathy, evaluation",
                'options' => json_encode([
                    "A" => ["text" => "Ask directly about the gap in a non-judgmental way", "score" => 3],
                    "B" => ["text" => "Reject them due to lack of continuity", "score" => 0],
                    "C" => ["text" => "Let the client know and let them decide", "score" => 1],
                    "D" => ["text" => "Wait until the interview to bring it up", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "You sense that a candidate’s values may not align with a client's company culture.",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Cultural Fit",
                'theme_tags' => "culture fit, team alignment, client insight",
                'options' => json_encode([
                    "A" => ["text" => "Submit them anyway—the client will decide", "score" => 1],
                    "B" => ["text" => "Discuss your concerns with the candidate first", "score" => 3],
                    "C" => ["text" => "Disqualify them to avoid a bad fit", "score" => 2],
                    "D" => ["text" => "Present them with a disclaimer", "score" => 0]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "A candidate tells a long story in response to your question, but never really answers it. What do you do?",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Listening Skills",
                'theme_tags' => "interviewing, listening, follow-up",
                'options' => json_encode([
                    "A" => ["text" => "Move on to the next question and hope for better answers later", "score" => 0],
                    "B" => ["text" => "Rephrase the question and redirect them politely", "score" => 3],
                    "C" => ["text" => "Interrupt them quickly and ask for specifics", "score" => 2],
                    "D" => ["text" => "Let them finish and make your own assumptions", "score" => 1]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "You notice small discrepancies between a candidate's LinkedIn profile and their CV. What do you do?",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Consistency Checking",
                'theme_tags' => "fact-checking, cross-referencing, diligence",
                'options' => json_encode([
                    "A" => ["text" => "Ask them about the differences directly", "score" => 3],
                    "B" => ["text" => "Ignore it—minor differences are common", "score" => 0],
                    "C" => ["text" => "Send both versions to the client", "score" => 1],
                    "D" => ["text" => "Request clarification before progressing", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'prompt' => "A candidate becomes defensive when asked about a job they left quickly. What do you do?",
                'skill' => "Candidate Qualification & Screening",
                'sub_skill' => "Tone Sensitivity",
                'theme_tags' => "candidate experience, tone, tact",
                'options' => json_encode([
                    "A" => ["text" => "Drop the topic to avoid conflict", "score" => 1],
                    "B" => ["text" => "Reframe the question with a softer tone", "score" => 3],
                    "C" => ["text" => "End the interview if they won’t engage", "score" => 0],
                    "D" => ["text" => "Push harder to get a clear answer", "score" => 2]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],

            
            
        ];

        DB::table('core_skill_questions')->insert($questions);
    }
}
