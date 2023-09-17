<?php

namespace Database\Seeders;

use App\Models\QuizTopic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            ['name' => 'math'],
            ['name' => 'history'],
            ['name' => 'english'],
            ['name' => 'bangla'],
            ['name' => 'science'],
            ['name' => 'technology'],
            ['name' => 'general'],
            ['name' => 'Cybersecurity'],
            ['name' => 'Climate Change'],
        ];
    
        foreach ($topics as $topic) {
            QuizTopic::create($topic);
        }
    }
    
}
