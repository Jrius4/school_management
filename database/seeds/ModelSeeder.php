<?php

use App\Career;
use App\Project;
use App\Service;
use App\QuoteRequest;
use App\FieldIndustry;
use App\SystemProcess;
use App\CareerCategory;
use App\ClientTestimony;
use App\NdebiTechClient;
use App\ProjectCategory;
use App\ServiceCategory;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(env('APP_ENV') === 'local')
        {
            // DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            if (env('DB_CONNECTION') === 'pgsql') {
                Schema::disableForeignKeyConstraints();
            }
            else {
                Schema::disableForeignKeyConstraints();
            }
            CareerCategory::truncate();
            Career::truncate();
            ClientTestimony::truncate();
            FieldIndustry::truncate();
            NdebiTechClient::truncate();
            ProjectCategory::truncate();
            Project::truncate();
            QuoteRequest::truncate();
            SystemProcess::truncate();
            ServiceCategory::truncate();
            Service::truncate();


            $projectCategoryQty = 4;
            // $serviceCategoryQty = 5;
            //services
            DB::table('service_categories')->insert([
                [
                    'image'=>'marketing.png',
                    'title' => 'Digital Marketing',
                    'slug' => "digital-marketing",
                    'description' => 'Digital Marketing service description'
                ],
                [
                    'image'=>'development.png',
                    'title' => 'App Development',
                    'slug' => "app-development",
                    'description' => 'App Development service description'
                ],
                [
                    'image'=>'strategy.png',
                    'title' => 'Web Development',
                    'slug' => "web-development",
                    'description' => 'Web Development service description'
                ],
                [
                    'image'=>'design.png',
                    'title' => 'Design & Branding',
                    'slug' => "desing-and-branding",
                    'description' => 'Design & Branding service description'
                ],
            ]);
            //processes
            DB::table('system_processes')->insert([
                [

                    'title' => 'DISCOVERY',
                    'slug' => "discovery",
                    'excerpt' => 'Every project begins with Discovery. We run stakeholder workshops to fully understand the problem we\'re trying to solve and the factors surrounding them.',
                    'body' => 'Every project begins with Discovery. We run stakeholder workshops to fully understand the problem we\'re trying to solve and the factors surrounding them.We need to know what success looks like for your brand and for your customers so we can work towards the most appropriate solutions.<br/><br/> Our process continues to embrace learning throughout the project cycle. We never presume to know all the answers, so we\'ll constantly research and test our ideas to gain fresh insight for continued improvemnt. We\'ll work with you to manage the scope and put together a project plan to outline expectationsand responsibilities for the project. We\'ll also produce any other documentation that\'s essential to the project\'s success.',
                ],
                [

                    'title' => 'DEVELOPMENT',
                    'slug' => "development",
                    'excerpt' => 'We closely stagger Discovery and Development sprints to promote better collaboration across the entire project team',
                    'body' => 'We closely stagger Discovery and Development sprints to promote better collaboration across the entire project team, uniting the disciplines of strategy, design and technology. <br/> Our process is designed to identify risks early on by wrapping everything inside a rapid testing and iteration enviroment. This helps us to validate and evolve solutions more quickly, as well as optimizing the user experience (UX) <br/><br/> We\'ll regularly share development progress with you to ensure you\'re engaged in the journey and given plenty opportunities to provide feedback.',
                ],
                [

                    'title' => 'DELIVERY',
                    'slug' => "delivery",
                    'excerpt' => 'Our QA and Delivery Plan allows us to manage your expectations throughout the project. Visibility of key deliveries will help you to plan',
                    'body' => 'Our QA and Delivery Plan allows us to manage your expectations throughout the project. Visibility of key deliveries will help you to plan related activities such as stakeholder reviews, content management and user testing. Only when we\'re satisfied that a project hits the mark on every level will we release it for final approval We\'re meticulous when it comes to standards and like any customer, we expect things to look great and work effortfully <br/><br/>We\'ll regularly share development progress with you to ensure you\'re engaged in the journey and given plenty opportunities to provide feedback.',
                ],

            ]);

            //career
            DB::table('career_categories')->insert([
                [
                    'title' => 'Technology',
                    'slug' => "technology",
                    'description' => 'Technology career description'
                ],
                [
                    'title' => 'Marketing',
                    'slug' => "marketing",
                    'description' => 'Marketing career description'
                ],
                [
                    'title' => 'Design',
                    'slug' => "design",
                    'description' => 'Design career description'
                ],

            ]);

            DB::table('careers')->insert([
                [
                    'title' => 'Full Stack Developer',
                    'slug' => "full-stack-developer",
                    'excerpt' => "We are looking for a Full Stack Development with excellent programming skills to join our team.",
                    'body' => "We are looking for a Full Stack Development with excellent programming skills to join our team. We need a person who
                                who, as part of a team, can create highly scalable web apps that millions of users interact with daily. The ideal candidate has experience
                                building real products for the web and should be able to present examples of their work. (Interns are also welcome) <br/><br/>
                                Are you interested in learning something new everyday? Would you like to work in a young creative and fun team? Do you love to work with the latest technologies? Have you ever imagined yourself working remotely? Then let become our teammate! <br/>
                                <h4>Responsibilies</h4>
                                As a Full Stack Developer, you daily responsibilities will include;<br/><br/>
                                Analyze customer requirements and design solution <br/>
                                Create fully functional applications that run across multiple devices and multiple browsers <br/>
                                Research new technologies and share with team members <br/>
                                Collaborate with project leaders, designers, and other stakeholders to get projects done on time with high quality <br/>
                                Your skills and experience <br/>
                                Good candidates for Full Stack Developer position should have the following qualifications; <br/><br/>
                                <h4>Experience in HTML5,CSS3</h4>
                                Execellent Javascript skills<br/><br/>
                                Familiar with new Javascript libraries & frameworks (NodeJS,React,React Native, Angular)<br/>
                                Experience with using Git<br/>
                                Experience with using database like MongoDB, MySQL,Redis<br/>
                                Good English communication skills<br/><br/>
                                <h4>Bonus points:</h4>
                                Experienced and be able to train other people and lead the projects<br/>
                                Experienced with pair programming<br/>
                                Experienced with TDD,continuous integration<br/>
                                Experienced with server operations, deployment and configuration<br/>",
                    'career_category_id' => 1
                ],
                [
                    'title' => 'Data Analyst',
                    'slug' => "data-analyst",
                    'excerpt' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                    tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                    iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis.",
                    'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis. <br/> <br/>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis.",
                    'career_category_id' => 1
                ],
                [
                    'title' => 'Graphics Designer',
                    'slug' => "graphics-designer",
                    'excerpt' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                    tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                    iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis.",
                    'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis. <br/> <br/>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis.",
                    'career_category_id' => 3
                ],
                [
                    'title' => 'Sales Manager',
                    'slug' => "sales-manager",
                    'excerpt' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                    tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                    iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis.",
                    'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis. <br/> <br/>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia ut soluta
                                tempore sunt delectus vitae voluptate dolor iusto, pariatur laboriosam,
                                iure repellendus, aspernatur provident inventore nobis nam porro deleniti corporis.",
                    'career_category_id' => 2
                ],



            ]);
            $projectQty = 4;
            $clientTestimonyQty = 15;
            $careerQty = 15;
            $fieldIndustryQty = 15;
            $ndebiTechClientQty = 15;

            $serviceQty = 8;
            $quoteRequestQty = 5;


            // factory(CareerCategory::class,$careerCategoryQty)->create();
            // factory(Career::class,$careerQty)->create();
            // factory(Career::class,$careerQty)->create()->each(
            //     function($career){
            //         $careerCategories = CareerCategory::all()->random(mt_rand(1,3))->pluck('id');
            //         $career->careerCategory()->attach($careerCategories);
            //     }
            // );

            // factory(ServiceCategory::class,$serviceCategoryQty)->create();
            factory(Service::class,$serviceQty)->create();
            // factory(Service::class,$serviceQty)->create()->each(
            //     function($service){
            //         $serviceCategories = ServiceCategory::all()->random(mt_rand(1,3))->pluck('id');
            //         $service->serviceCategory()->attach($serviceCategories);
            //     }
            // );

            factory(ProjectCategory::class,$projectCategoryQty)->create();
            factory(Project::class,$projectQty)->create();
            // factory(Project::class,$projectQty)->create()->each(
            //     function($project){
            //         $projectCategories = ProjectCategory::all()->random(mt_rand(1,3))->pluck('id');
            //         $project->projectCategory()->attach($projectCategories);
            //     }
            // );

            factory(ClientTestimony::class,$clientTestimonyQty)->create();
            factory(FieldIndustry::class,$fieldIndustryQty)->create();
            factory(NdebiTechClient::class,$ndebiTechClientQty)->create();
            factory(QuoteRequest::class,$quoteRequestQty)->create();


        }
    }
}
