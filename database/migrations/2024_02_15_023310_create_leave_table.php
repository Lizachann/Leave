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
            $table->string('LeaveType');
            $table->float('ResquestedDays');
//            $table->float('DaysOutstand');
            $table->string('FromDate');
            $table->string('FromTime');
            $table->string('ToDate');
            $table->string('ToTime');

//            $table->string('Sign');
//            $table->date('PostingDate');
            $table->string('WorkCovered');
            $table->integer('HodRemarks');
//            $table->string('HodSign');
            $table->string('HodDate');
            $table->integer('RegRemarks');
//            $table->string('RegSign');
            $table->string('RegDate');
            $table->integer('IsRead');
            $table->integer('emp_id');
            $table->float('num_days');
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
