<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category', 100);
            $table->string('company_name');
            $table->string('location')->default('Calgary, AB');
            $table->string('employment_type', 120);
            $table->string('schedule', 120)->nullable();
            $table->text('summary');
            $table->longText('description');
            $table->string('image_path')->nullable();
            $table->json('tags')->nullable();
            $table->json('responsibilities')->nullable();
            $table->json('requirements')->nullable();
            $table->string('status', 20)->default('active');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        $now = now();

        DB::table('job_openings')->insert([
            [
                'title' => 'Warehouse Associate',
                'slug' => 'warehouse-associate',
                'category' => 'Warehouse',
                'company_name' => 'Northline Distribution',
                'location' => 'Calgary, AB',
                'employment_type' => 'Temporary / Contract',
                'schedule' => 'Full Shift Support',
                'summary' => 'Support inventory handling, order preparation, loading flow, and general warehouse operations.',
                'description' => 'Swift Manpower Temps Agency Ltd is recruiting dependable candidates for warehouse support roles in Calgary. This opportunity suits applicants who are active, organized, safety-conscious, and comfortable supporting fast-moving warehouse operations.',
                'image_path' => 'assets/images/news/news-1.jpg',
                'tags' => json_encode(['Order picking', 'Inventory support']),
                'responsibilities' => json_encode([
                    'Receive, sort, and move materials accurately across the warehouse floor.',
                    'Prepare outgoing orders and maintain organized storage areas for smoother operations.',
                    'Follow workplace safety procedures and site instructions consistently throughout each shift.',
                    'Work cooperatively with supervisors and team members to support daily output goals.',
                ]),
                'requirements' => json_encode([
                    'Ability to handle active, hands-on work in a structured warehouse setting.',
                    'Reliable attendance, punctuality, and willingness to follow procedures.',
                    'Good communication and a cooperative approach to team-based tasks.',
                    'Previous warehouse or labour experience is helpful, though not always required.',
                ]),
                'status' => 'active',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'General Labourer',
                'slug' => 'general-labourer',
                'category' => 'Labour',
                'company_name' => 'Prairie Build Group',
                'location' => 'Calgary, AB',
                'employment_type' => 'Flexible Assignment',
                'schedule' => 'Site Ready',
                'summary' => 'Assist with material movement, cleanup, setup support, and everyday labour tasks across worksites.',
                'description' => 'This role is ideal for candidates ready to support busy worksites with physical labour, site setup, and dependable day-to-day assistance.',
                'image_path' => 'assets/images/news/news-2.jpg',
                'tags' => json_encode(['Physical work', 'Team support']),
                'responsibilities' => json_encode([
                    'Move materials and supplies safely around the worksite.',
                    'Support cleanup, setup, and general labour tasks as directed.',
                    'Follow site safety standards and supervisor instructions.',
                    'Assist crews with practical hands-on tasks throughout the shift.',
                ]),
                'requirements' => json_encode([
                    'Comfortable with physical tasks and active movement during the day.',
                    'Dependable attendance and a strong work ethic.',
                    'Ability to follow instructions and work within a team environment.',
                ]),
                'status' => 'active',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Administrative Support',
                'slug' => 'administrative-support',
                'category' => 'Office Support',
                'company_name' => 'Summit Admin Services',
                'location' => 'Calgary, AB',
                'employment_type' => 'Day Schedule',
                'schedule' => 'Client Facing',
                'summary' => 'Help with scheduling, file organization, document handling, and day-to-day office coordination.',
                'description' => 'This opportunity suits organized candidates who can help coordinate office routines, manage documentation, and support internal teams professionally.',
                'image_path' => 'assets/images/news/news-3.jpg',
                'tags' => json_encode(['Documentation', 'Scheduling']),
                'responsibilities' => json_encode([
                    'Manage scheduling, filing, and routine office coordination.',
                    'Support documentation workflows and internal communication.',
                    'Handle basic administrative requests with professionalism and accuracy.',
                ]),
                'requirements' => json_encode([
                    'Strong organization and communication skills.',
                    'Comfort with office systems and administrative tasks.',
                    'Professional approach to supporting staff and clients.',
                ]),
                'status' => 'active',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Forklift Operator',
                'slug' => 'forklift-operator',
                'category' => 'Equipment',
                'company_name' => 'WestEdge Logistics',
                'location' => 'Calgary, AB',
                'employment_type' => 'Warehouse Shift',
                'schedule' => 'Safety Focused',
                'summary' => 'Operate warehouse equipment safely while supporting shipping, receiving, and internal movement.',
                'description' => 'We are seeking safety-focused operators who can support warehouse flow with equipment handling, receiving, and shipping support.',
                'image_path' => 'assets/images/news/news-4.jpg',
                'tags' => json_encode(['Machine operation', 'Receiving']),
                'responsibilities' => json_encode([
                    'Operate forklifts and related equipment safely.',
                    'Support shipping, receiving, and internal stock movement.',
                    'Maintain awareness of warehouse safety standards and flow.',
                ]),
                'requirements' => json_encode([
                    'Relevant operating experience or certification where required.',
                    'Strong attention to safety and warehouse procedures.',
                    'Reliable attendance and teamwork.',
                ]),
                'status' => 'active',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Cleaning Staff',
                'slug' => 'cleaning-staff',
                'category' => 'Facilities',
                'company_name' => 'CleanPath Facility Services',
                'location' => 'Calgary, AB',
                'employment_type' => 'Ongoing Support',
                'schedule' => 'Routine Schedule',
                'summary' => 'Maintain clean, orderly, and safe work environments in commercial and industrial settings.',
                'description' => 'This role supports safe and professional environments through routine cleaning, upkeep, and workplace standards across active business sites.',
                'image_path' => 'assets/images/news/news-5.jpg',
                'tags' => json_encode(['Cleaning routines', 'Safety standards']),
                'responsibilities' => json_encode([
                    'Perform routine cleaning across assigned work areas.',
                    'Support site presentation, hygiene, and safety expectations.',
                    'Report supply or maintenance needs when observed.',
                ]),
                'requirements' => json_encode([
                    'Dependability and attention to detail.',
                    'Ability to follow site cleaning routines and standards.',
                    'Comfort working across commercial or industrial environments.',
                ]),
                'status' => 'active',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Customer Service Representative',
                'slug' => 'customer-service-representative',
                'category' => 'Customer Support',
                'company_name' => 'Harbor Client Solutions',
                'location' => 'Calgary, AB',
                'employment_type' => 'Daytime Role',
                'schedule' => 'Communication Driven',
                'summary' => 'Provide front-line communication, service coordination, and responsive support for clients and teams.',
                'description' => 'This opportunity is well suited to candidates with strong communication skills who can handle customer enquiries, service coordination, and front-line support.',
                'image_path' => 'assets/images/news/news-6.jpg',
                'tags' => json_encode(['Phone support', 'Client service']),
                'responsibilities' => json_encode([
                    'Respond to client enquiries professionally and promptly.',
                    'Coordinate routine service communication and follow-up.',
                    'Maintain organized records of interactions and requests.',
                ]),
                'requirements' => json_encode([
                    'Strong verbal and written communication skills.',
                    'Comfort with customer-facing support and coordination.',
                    'Professional attitude and dependable follow-through.',
                ]),
                'status' => 'active',
                'published_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
