<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                "employer_id" => 1,
                "company_name" => "Tech Solutions Ltd",
                "company_logo" => "tech_solutions_logo.png",
                "title" => "Software Engineer",
                "description" => "Develop and maintain cutting-edge web applications.",
                "requirements" => "PHP, Laravel, JavaScript, MySQL",
                "benefits" => "Remote work, Health insurance",
                "salary_range" => "£40,000 - £50,000",
            ],
            [
                "employer_id" => 2,
                "company_name" => "Creative Minds Agency",
                "company_logo" => "creative_minds_logo.png",
                "title" => "UI/UX Designer",
                "description" => "Design intuitive user interfaces and enhance user experience.",
                "requirements" => "Figma, Adobe XD, UX research",
                "benefits" => "Flexible hours, Gym membership",
                "salary_range" => "£30,000 - £45,000",
            ],
            [
                "employer_id" => 3,
                "company_name" => "NextGen IT",
                "company_logo" => "nextgen_it_logo.png",
                "title" => "Backend Developer",
                "description" => "Build APIs and maintain server-side applications.",
                "requirements" => "Node.js, Express, MongoDB",
                "benefits" => "Yearly bonus, Paid vacations",
                "salary_range" => "£45,000 - £55,000",
            ],
            [
                "employer_id" => 4,
                "company_name" => "Visionary Labs",
                "company_logo" => "visionary_labs_logo.png",
                "title" => "Data Analyst",
                "description" => "Analyze data trends to help strategic decision-making.",
                "requirements" => "SQL, Excel, Power BI",
                "benefits" => "Remote work, Training programs",
                "salary_range" => "£35,000 - £45,000",
            ],
            [
                "employer_id" => 5,
                "company_name" => "Bright Future Co.",
                "company_logo" => "bright_future_logo.png",
                "title" => "Project Manager",
                "description" => "Lead cross-functional teams for project delivery.",
                "requirements" => "Agile, Scrum certification, Leadership skills",
                "benefits" => "Healthcare, Performance bonus",
                "salary_range" => "£50,000 - £65,000",
            ],
            [
                "employer_id" => 6,
                "company_name" => "Innovatech",
                "company_logo" => "innovatech_logo.png",
                "title" => "DevOps Engineer",
                "description" => "Automate infrastructure and deployment pipelines.",
                "requirements" => "AWS, Docker, Kubernetes",
                "benefits" => "Home office allowance, Stock options",
                "salary_range" => "£55,000 - £70,000",
            ],
            [
                "employer_id" => 7,
                "company_name" => "HealthFirst",
                "company_logo" => "healthfirst_logo.png",
                "title" => "Healthcare Data Scientist",
                "description" => "Apply data science techniques in healthcare sector.",
                "requirements" => "Python, Machine Learning, Healthcare data knowledge",
                "benefits" => "Research grants, Conferences",
                "salary_range" => "£60,000 - £80,000",
            ],
            [
                "employer_id" => 8,
                "company_name" => "EcoWorld Ltd",
                "company_logo" => "ecoworld_logo.png",
                "title" => "Environmental Engineer",
                "description" => "Design and implement environmental sustainability solutions.",
                "requirements" => "Civil engineering, Environmental laws",
                "benefits" => "Travel allowance, Paid certifications",
                "salary_range" => "£40,000 - £55,000",
            ],
            [
                "employer_id" => 9,
                "company_name" => "MarketPros",
                "company_logo" => "marketpros_logo.png",
                "title" => "Digital Marketing Specialist",
                "description" => "Develop digital marketing strategies for brand growth.",
                "requirements" => "SEO, Google Ads, Content strategy",
                "benefits" => "Commission on sales, Work from home",
                "salary_range" => "£30,000 - £40,000",
            ],
            [
                "employer_id" => 10,
                "company_name" => "FinServe UK",
                "company_logo" => "finserve_uk_logo.png",
                "title" => "Financial Analyst",
                "description" => "Prepare financial models and investment reports.",
                "requirements" => "Finance degree, Excel modeling, CFA preferred",
                "benefits" => "Bonus scheme, Hybrid working",
                "salary_range" => "£45,000 - £60,000",
            ],
        ];

        foreach ($jobs as &$job) {
            $job['created_at'] = now();
            $job['updated_at'] = now();
        }

        DB::table('jobs')->insert($jobs);
    }
}
