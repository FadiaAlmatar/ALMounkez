<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');//الاسم
            $table->string('lastname');//النسبة
            $table->string('father_name');//اسم الاب
            $table->string('grandfather_name');//اسم الجد
            $table->string('mother_name');//اسم الام
            $table->string('gender')->nullable();//الجنس
            $table->string('english_firstname');//االاسم بالانكليزي
            $table->string('english_lastname');//النسبة بالانكليزي
            $table->string('english_father_name');//اسم الاب انكليزي
            $table->string('english_mother_name');//اسم الام انكليزي
            $table->string('Nationality')->nullable();//الجنسية
            $table->string('Marital_status')->nullable();//الوضع العائلي
            $table->string('place_of_birth');//مكان الولادة
            $table->date('date_of_birth');//تاريخ الولادة
            $table->integer('national_id');// الرقم الوطني
            $table->string('civil_registry_secretariat');//أمانة السجل المدني
            $table->integer('personal_identification_number');//رقم الهوية الشخصية
            $table->date('Identity_grant_date');//تاريخ منح الهوية
            $table->string('constraint');//محل ورقم القيد
            $table->string('military')->nullable();//خدمة العلم
            $table->integer('public_record_number')->nullable();//رقم السجل العام
            $table->string('Health_status')->nullable();//الوضع الصحي
            $table->string('Affiliation_country');//المحافظة التي يرغب النتساب بها
            $table->string('address');//العنوان
            $table->string('house_phone')->nullable();//هاتف منزل
            $table->string('work_phone')->nullable();//هاتف مكتب
            $table->integer('mobile')->nullable();//موبايل
            $table->string('email')->nullable();//بريد الكتورني
            $table->string('fax')->nullable();//فاكس
            $table->string('site')->nullable();//موقع الكتروني
            $table->boolean('work_in_government')->nullable();//العمل في الدولة
            $table->string('side_work')->nullable();//جهة العمل
            $table->string('insurance_number')->nullable();//الرقم التأميني
            $table->boolean('displayData');//إظهار معلومات الاتصال ع الموقع
            $table->string('qualification')->nullable();//المؤهل
            $table->string('university')->nullable();//الجامعه
            $table->string('country')->nullable();//البلد
            $table->date('graduation_year')->nullable();//سنة التخرج
            $table->float('graduation_rate')->nullable();//معدل التخرج
            $table->string('Specialization')->nullable();//التخصص
            $table->string('pay_affiliation_fee')->nullable();//طريقة سداد رسم الانتساب
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
        Schema::dropIfExists('orders');
    }
}
