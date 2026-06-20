<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employer_job_requests', function (Blueprint $table) {
            $table->string('company_name')->nullable()->after('id');
            $table->string('website')->nullable()->after('company_name');
            $table->string('industry', 100)->nullable()->after('website');
            $table->string('company_phone', 50)->nullable()->after('industry');
            $table->string('company_address', 500)->nullable()->after('company_phone');
            $table->string('contact_first_name')->nullable()->after('company_address');
            $table->string('contact_last_name')->nullable()->after('contact_first_name');
            $table->string('profile_link')->nullable()->after('contact_last_name');
            $table->string('specialization', 120)->nullable()->after('interest');
            $table->string('job_location')->nullable()->after('specialization');
            $table->string('pay_rate')->nullable()->after('job_location');
            $table->string('position_hiring_for')->nullable()->after('pay_rate');
            $table->string('preferred_pronoun', 120)->nullable()->after('position_hiring_for');
            $table->string('openings_count', 50)->nullable()->after('preferred_pronoun');
        });
    }

    public function down(): void
    {
        Schema::table('employer_job_requests', function (Blueprint $table) {
            $table->dropColumn([
                'company_name',
                'website',
                'industry',
                'company_phone',
                'company_address',
                'contact_first_name',
                'contact_last_name',
                'profile_link',
                'specialization',
                'job_location',
                'pay_rate',
                'position_hiring_for',
                'preferred_pronoun',
                'openings_count',
            ]);
        });
    }
};
