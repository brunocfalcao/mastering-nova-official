<?php

namespace Eduka\MasteringNovaOfficial;

use Eduka\Abstracts\EdukaServiceProvider;
use Eduka\Cube\Models\Course;

class MasteringNovaOfficialServiceProvider extends EdukaServiceProvider
{
    public function boot()
    {
        $this->customViewNamespace(__DIR__.'/../resources/views', 'site');

        $this->publishResources();

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $course = course();

        session([$course->canonical.'-base-path' => str_replace('\\', '/', __DIR__).'/../']);

        /**
         * Configure the postmark token. It can't run under the course()
         * helper because if a job triggers this service provider, it will
         * still not be bound to a domain. So, we need to find it by
         * querying the course canonical directly.
         */
        config()->set('mail.mailers.postmark.token', $course->postmark_token);

        // Load extra routes test.
        $this->extraRoutes(__DIR__.'/../routes/extra.php');
    }

    public function register()
    {
        //
    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__.'/../resources/overrides/' => base_path('/'),
        ], 'mastering-nova-official-overrides');
    }
}
