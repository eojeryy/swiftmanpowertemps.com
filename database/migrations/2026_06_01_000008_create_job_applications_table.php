<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('phone', 50);
            $table->string('address', 500);
            $table->string('education');
            $table->string('skills');
            $table->string('experience');
            $table->string('qualities');
            $table->string('upload_file');
            $table->string('job_number', 100);
            $table->string('work_status');
            $table->longText('message')->nullable();
            $table->string('status', 30)->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
