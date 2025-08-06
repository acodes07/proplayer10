<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Player Profile Management',
                'description' => 'Create and manage comprehensive player profiles with performance metrics, statistics, and career progression tracking.',
                'icon' => 'fas fa-user-circle',
                'is_active' => true,
            ],
            [
                'name' => 'Talent Scouting Tools',
                'description' => 'Advanced scouting tools to identify and evaluate promising football talents with detailed assessment criteria.',
                'icon' => 'fas fa-search',
                'is_active' => true,
            ],
            [
                'name' => 'Performance Analytics',
                'description' => 'Comprehensive analytics dashboard to track player performance, fitness levels, and improvement metrics.',
                'icon' => 'fas fa-chart-line',
                'is_active' => true,
            ],
            [
                'name' => 'Training Programs',
                'description' => 'Customized training programs and drills designed for different skill levels and positions.',
                'icon' => 'fas fa-dumbbell',
                'is_active' => true,
            ],
            [
                'name' => 'Match Scheduling',
                'description' => 'Organize and manage match schedules, tournaments, and competitive events for talent development.',
                'icon' => 'fas fa-calendar-alt',
                'is_active' => true,
            ],
            [
                'name' => 'Communication Hub',
                'description' => 'Integrated messaging system for coaches, scouts, and players to coordinate and share information.',
                'icon' => 'fas fa-comments',
                'is_active' => true,
            ],
            [
                'name' => 'Career Development',
                'description' => 'Guidance and resources for players to develop their careers from grassroots to professional level.',
                'icon' => 'fas fa-road',
                'is_active' => true,
            ],
            [
                'name' => 'Team Management',
                'description' => 'Tools for coaches to manage team rosters, formations, and tactical strategies.',
                'icon' => 'fas fa-users',
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
} 