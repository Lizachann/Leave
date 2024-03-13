<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblleaves', function (Blueprint $table) {
            $table->id();
            $table->string('leave_type');
            $table->float('request_days');
            $table->float('leaveDays_left')->nullable();
            $table->string('from_date');
            $table->string('to_date');
            $table->string('work_covered');
            $table->integer('hod_remark')->nullable()->default(0);
            $table->string('hod_date')->nullable();
            $table->integer('admin_remark')->nullable()->default(0);
            $table->string('admin_date')->nullable();
            $table->integer('emp_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblleaves');
    }
};
