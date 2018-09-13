<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Billing;
use App\Policies\BillingPolicy;
use App\Patient;
use App\Policies\PatientPolicy;
use App\Permision;
use App\Policies\PermisionPolicy;
use App\Setting;
use App\Policies\SettingPolicy;
use App\Sms;
use App\Policies\SmsPolicy;
use App\SurgeryName;
use App\Policies\SurgeryNamePolicy;
use App\Surgery;
use App\Policies\SurgeryPolicy;
use App\UserPermission;
use App\Policies\UserPermissionPolicy;
use App\User;
use App\Policies\UserPolicy;
use App\Visit;
use App\Policies\VisitPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Billing::class => BillingPolicy::class,
        Patient::class => PatientPolicy::class,
        Permision::class => PermisionPolicy::class,
        Setting::class => SettingPolicy::class,
        Sms::class => SmsPolicy::class,
        SurgeryName::class => SurgeryNamePolicy::class,
        Surgery::class => SurgeryPolicy::class,
        UserPermission::class => UserPermissionPolicy::class,
        User::class => UserPolicy::class,
        Visit::class => VisitPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
