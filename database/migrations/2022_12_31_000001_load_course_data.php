<?php

use Eduka\Cube\Models\Chapter;
use Eduka\Cube\Models\Course;
use Eduka\Cube\Models\Series;
use Eduka\Cube\Models\User;
use Eduka\Cube\Models\Video;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * The migration filename date should be always after all the eduka migration
 * file dates. This file (or all the course migration files) should be the
 * last ones to be loaded into the database.
 *
 * E.g.: 2022_12_31_0000001_load_course_data
 *       2022_12_31_0000002_update_course_data_1
 *       2022_12_31_0000003_update_course_data_2
 *       ...
 */
class LoadCourseData extends Migration
{
    public function up()
    {
        /**
         * Import data from the CSV data sources.
         */
        $basePath = __DIR__.'/../../';
        $assetsPath = $basePath.'database/assets/';

        // Add Series.
        $orion = Series::create([
            'title' => 'Orion(3.x)',
            'course_id' => 1,
        ]);

        $silverSurfer = Series::create([
            'title' => 'Silver Surfer(4.x)',
            'course_id' => 1,
        ]);

        // CSV chapters.csv -- All part of the first series.
        File::processCsv($assetsPath.'chapters.csv', function ($line, $key) {
            Chapter::create([
                'title' => $line[1],
                'course_id' => 1, // Can be hardcoded, there is only 1 course.
            ]);
        });

        $course = Course::all()->first();

        // CSV users.csv
        File::processCsv($assetsPath.'users.csv', function ($line) use ($course) {
            $user = User::create([
                'name' => $line[1],
                'email' => $line[2],
                'password' => $line[6],
                'created_at' => $line[12],
                'updated_at' => $line[13],
            ]);

            $user->addCourse($course);
        });

        // Add Videos.
        File::processCsv($assetsPath.'videos.csv', function ($line) {
            DB::table('videos')
              ->insert([
                  'title' => $line[1],
                  'details' => $line[2],
                  'index' => $line[3],
                  'is_free' => $line[6],
                  'chapter_id' => $line[7],
                  'duration' => $line[8],
                  'vimeo_id' => $line[9],
                  'filename' => $line[10],
                  'created_at' => $line[11],
                  'published_at' => now(),
                  'updated_at' => $line[12],
                  'deleted_at' => $line[13],
              ]);
        });

        // Add videos completed.
        File::processCsv($assetsPath.'videos_completed.csv', function ($line) {
            DB::table('videos_completed')
              ->insert([
                  'video_id' => $line[1],
                  'user_id' => $line[2],
                  'created_at' => $line[3],
                  'updated_at' => $line[4],
              ]);
        });

        // Update to 3.x series. Videos and Chapters (until now).
        Video::query()->update([
            'series_id' => 1,
            'published_at' => now(),
            'is_enabled' => true,
        ]);

        Chapter::query()->update([
            'series_id' => 1,
            'course_id' => 1,
        ]);

        // Add video images.
        $mappingFiles = [
            1 => 'installing-nova.jpg',
            2 => 'first-glance-at-the-file-structure.jpg',
            3 => 'what-is-a-resource.jpg',
            4 => 'creating-your-first-resource.jpg',
            5 => 'first-glance-to-the-resource-fields.jpg',
            6 => 'the-beauty-of-filters.jpg',
            7 => 'getting-deeper-on-data-viewing-using-lenses.jpg',
            8 => 'executing-actions-on-your-resources.jpg',
            9 => 'visualizing-data-using-metrics.jpg',
            10 => 'first-glance-at-resource-relationships.jpg',
            11 => 'using-customized-accessors-on-global-search.jpg',
            12 => 'recompiling-nova-assets.jpg',
            13 => 'data-sync-between-server-and-client-ui-components.jpg',
            14 => 'creating-your-first-ui-component-enhanced-field.jpg',
            15 => 'sorting-your-resources-in-the-sidebar.jpg',
            16 => 'the-power-of-abstract-resources.jpg',
            17 => 'loading-resources-from-custom-locations.jpg',
            18 => 'filter-to-select-columns.jpg',
            19 => 'the-full-power-of-resource-policies.jpg',
            20 => 'single-package-creation-for-all-of-your-ui-components.jpg',
            21 => 'customizing-your-resource-visibility.jpg',
            22 => 'how-to-correctly-use-the-index-query.jpg',
            23 => 'using-resource-data-scopes.jpg',
            24 => 'cloning-resources-for-a-better-resource-strategy.jpg',
            25 => 'polymorphic-relationships.jpg',
            26 => 'many-to-many-relationship-with-additional-pivot-columns.jpg',
            27 => 'changing-stub-files.jpg',
            28 => 'configuring-field-groups-for-each-display-context.jpg',
            29 => 'resource-1-o-1-checklist-guidelines.jpg',
            30 => 'what-is-an-ui-component.jpg',
            31 => 'designing-a-simple-ui-component.jpg',
            32 => 'ui-component-properties-you-can-use.jpg',
            33 => 'extending-default-nova-ui-components.jpg',
            34 => 'using-emit-events.jpg',
            35 => 'practical-example-2-dropdowns.jpg',
            36 => 'creating-the-composer-package.jpg',
            37 => 'sidebar-cloning.jpg',
            38 => 'creating-the-assign-ticket-action.jpg',
            39 => 'creating-the-my-tickets-index-using-local-scopes.jpg',
            40 => 'having-an-admin-permission-to-manage-any-ticket.jpg',
            41 => 'creating-the-ticket-resolved-action.jpg',
            42 => 'creating-another-action-to-unassign-tickets.jpg',
            43 => 'creating-ticket-performance-cards.jpg',
            44 => 'resource-testing-1-o-1.jpg',
            45 => 'search-relations.jpg',
            46 => 'button-field.jpg',
            47 => 'ajax-child-select.jpg',
            48 => 'nova-assertions.jpg',
            49 => 'responsive-theme.jpg',
            50 => 'integrating-socialite-for-oauth-authentication.jpg',
            51 => 'package-spatie-laravel-multitenancy.jpg',
        ];

        foreach ($mappingFiles as $id => $filename) {
            Video::firstWhere('id', $id)
                 ->addMedia(with_dir_separator(
                     $basePath.
                     "resources/images/videos/{$filename}"
                 ))
                 ->preservingOriginal()
                 ->toMediaCollection()
                 ->save();
        }

        /**
         * Obtain admin user credentials from the .env data.
         */
        $user = User::create([
            'name' => env('EDUKA_COURSE_ADMIN_NAME'),
            'email' => env('EDUKA_COURSE_ADMIN_EMAIL'),
            'email_verified_at' => now(),
            'password' => bcrypt(env('EDUKA_COURSE_ADMIN_PASSWORD')),
        ]);

        $course->addUser($user, true);
    }

    public function down()
    {
        //
    }

    private function video($fields, $path)
    {
        $video = Video::create($fields);

        $path = with_dir_separator(
            __DIR__.
            "resources/images/videos/{$path}"
        );

        $video->addMedia($path)
              ->preservingOriginal()
              ->toMediaCollection()
              ->save();
    }
}
