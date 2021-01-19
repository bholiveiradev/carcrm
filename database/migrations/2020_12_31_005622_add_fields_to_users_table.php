<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('domain')->after('remember_token')->nullable();
            $table->string('subdomain')->after('domain')->nullable();
            $table->string('logo')->after('subdomain')->nullable();
            $table->string('facebook')->after('logo')->nullable();
            $table->string('facebook_page_id')->after('facebook')->nullable();
            $table->string('facebook_pixel')->after('facebook_page_id')->nullable();
            $table->string('google_analytics')->after('facebook_pixel')->nullable();
            $table->string('whatsapp')->after('google_analytics')->nullable();
            $table->string('email_contact')->after('whatsapp')->nullable();
            $table->string('site_title')->after('email_contact')->nullable();
            $table->longText('site_keywords')->after('site_title')->nullable();
            $table->longText('site_description')->after('site_keywords')->nullable();
            $table->tinyInteger('plan_id')->after('site_description')->nullable();
            $table->dateTime('next_expiration')->after('plan_id')->nullable();
            $table->dateTime('desabled_account')->after('next_expiration')->nullable();
            $table->dateTime('delete_account')->after('desabled_account')->nullable();
            $table->boolean('status')->after('delete_account')->default(true);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('domain');
            $table->dropColumn('subdomain');
            $table->dropColumn('logo');
            $table->dropColumn('facebook');
            $table->dropColumn('facebook_page_id');
            $table->dropColumn('facebook_pixel');
            $table->dropColumn('google_analytics');
            $table->dropColumn('whatsapp');
            $table->dropColumn('email_contact');
            $table->dropColumn('site_title');
            $table->dropColumn('site_keywords');
            $table->dropColumn('site_description');
            $table->dropColumn('plan_id');
            $table->dropColumn('next_expiration');
            $table->dropColumn('desabled_account');
            $table->dropColumn('delete_account');
            $table->dropColumn('status');
            $table->dropColumn('deleted_at');
        });
    }
}
