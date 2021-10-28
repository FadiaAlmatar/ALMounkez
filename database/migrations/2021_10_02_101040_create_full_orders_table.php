<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('full_orders', function (Blueprint $table) {
            $table->id();//رقم الطلب
            $table->string('type')->nullable();//نوع الطلب
            $table->string('type_ar')->nullable();
            $table->string('fullname')->nullable();
            $table->foreignId('branch_id');//رقم الفرع
            $table->string('side')->nullable();//الجهة التي سيقدم عليها
            $table->foreignId('user_id');//رقم مقدم الطلب
            $table->integer('membership_id');//رقم عضوية مقدم الطلب
            $table->boolean('not_debtor')->nullable();//بريئ الذمة
            $table->float('money_debt')->nullable();//مبلغ الذمة
            $table->float('money_order')->nullable();// مبلغ الطلب أو مبلغ امين الصندوق
            // $table->date('date_order')->nullable();//تاريخ قبض امين الصندوق
            $table->float('money_central')->nullable();//مبلغ امين الصندوق المركزية
            // $table->date('date_central')->nullable();//تاريخ قبض امين الصندوق المركزية
            $table->boolean('capture')->nullable();//تم القبض
            $table->boolean('receipt')->nullable();//تم الاستلام
            $table->date('Published_at')->nullable();//تاريخ الصدور
            $table->date('received_date')->nullable();//تاريخ الاستلام
            $table->string('country_before')->nullable();//المحافظة المنتقل منها
            $table->string('country_after')->nullable();//المحافظة المنتقل اليها
            $table->text('transportation_reasons')->nullable();//أسباب النقل
            $table->string('home_change')->nullable();//صورة ثبوتية لتغيير مكان السكن
            $table->string('work_change')->nullable();//صورة ثبوتية لتغيير مكان العمل
            $table->boolean('registered_branch_decision')->nullable();//قرار الفرع المسجل به
            $table->text('registered_branch_disapproval_reasons')->nullable();//اسباب عدم موافقة الفرع المسجل به
            $table->boolean('transferred_branch_decision')->nullable();//قرار الفرع المنتقل اليه
            $table->text('transferred_branch_disapproval_reasons')->nullable();//أسباب عدم موافقة الفرع المنتقل اليه
            $table->boolean('Chairman_decision')->nullable();//قرار رئيس مجلس الادارة
            $table->text('Chairman_disapproval_reasons')->nullable();//اسباب عدم موافقة رئيس مجلس الادارة
            $table->biginteger('newmembership_number')->nullable();//رقم العضوية الجديد
            $table->text('replace_reasons')->nullable();//اسباب استبدال
            $table->string('police_image')->nullable();//صورة ضبط الشرطة
            $table->string('damaged_card_image')->nullable();//صورة البطاقة التالفة
            $table->string('judgment_decision_image')->nullable();//صورة قرار المحكمة
            $table->string('passport_image')->nullable();//صورة جواز السفر
            $table->string('fullname_arabic')->nullable();//الاسم الثلاثي عربي
            $table->string('fullname_english')->nullable();//الاسم الثلاثي انكليزي
            $table->string('personal_image')->nullable();//الصورة الشخصية
            $table->string('personal_dentification_image')->nullable();//صورة عن الهوية الشخصية
            $table->string('status')->nullable();//حالة الطلب
            $table->string('status_ar')->nullable();
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
        Schema::dropIfExists('full_orders');
    }
}
