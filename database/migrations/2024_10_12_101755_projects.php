<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tag_task', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:database/migrations/2024_10_12_101755_projects.php
            $table->string('name');
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
========
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
>>>>>>>> cc4c5c4 (Tags are linked to tasks and projects via the "many to many" model, the ability to select a tag in the task and project creation and editing forms has been added, and the ability to select a task or project in the tag creation and editing form has been added. Tags are displayed on the projects and tasks pages in the format of the number of tags linked to the project/task and in a clickable format on the page of a specific project and task.):database/migrations/2024_10_13_203409_tag_task.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
