<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employer_job_requests', function (Blueprint $table) {
            $table->foreignId('job_opening_id')->nullable()->after('status')->constrained('job_openings')->nullOnDelete();
            $table->timestamp('approved_at')->nullable()->after('job_opening_id');
        });
    }

    public function down(): void
    {
        Schema::table('employer_job_requests', function (Blueprint $table) {
            $table->dropConstrainedForeignId('job_opening_id');
            $table->dropColumn('approved_at');
        });
    }
};
