<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Profile;
use App\Models\Stat;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Writing;
use App\Models\Principle;
use App\Models\Education;
use App\Models\Language;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    $json = json_decode(
        File::get(storage_path('app/data.json')),
        true
    );

    // Profile
    Profile::create($json['profile']);

    // Stats
    Stat::insert($json['stats']);

    // Skills
    foreach ($json['skills'] as $skillGroup) {
        foreach ($skillGroup['items'] as $item) {
            Skill::create([
                'category' => $skillGroup['category'],
                'name' => $item,
            ]);
        }
    }

    // Experience
    foreach ($json['experience'] as $exp) {
    Experience::create([
        'role' => $exp['role'],
        'company' => $exp['company'],
        'location' => $exp['location'] ?? null,
        'period' => $exp['period'],
        'current' => $exp['current'] ?? true,
        'href' => $exp['href'] ?? null,
        'highlights' => $exp['highlights'] ?? null,
    ]);
}

    // Projects
    foreach ($json['projects'] as $project) {
    Project::create([
        'name' => $project['name'],
        'subtitle' => $project['subtitle'],
        'link' => $project['link'] ?? null,
        'stack' => $project['stack'] ?? null,
        'highlights' => $project['highlights'] ?? null,
        'year' => $project['year'] ?? null,
        'category' => $project['category'] ?? null,
    ]);
}

    // Writing
    foreach ($json['writing'] as $article) {
        Writing::create($article);
    }

    // Principles
    foreach ($json['principles'] as $principle) {
        Principle::create($principle);
    }

    // Education
    Education::create($json['education']);

    // Languages
    Language::insert($json['languages']);
}    
}
