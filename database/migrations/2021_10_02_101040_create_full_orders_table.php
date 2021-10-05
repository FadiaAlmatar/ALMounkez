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
            $table->foreignId('branch_id');//رقم الفرع
            $table->string('side');//الجهة التي سيقدم عليها
            $table->foreignId('user_id');//رقم مقدم الطلب
            $table->integer('membership_id');//رقم عضوية مقدم الطلب
            $table->boolean('not_debtor')->nullable();//بريئ الذمة
            $table->float('money_debt')->nullable();//مبلغ الذمة
            $table->float('money_order')->nullable();//مبلغ الطلب
            $table->boolean('capture')->nullable();//تم القبض
            $table->boolean('receipt')->nullable();//تم الاستلام
            $table->date('Published_at')->nullable();//تاريخ الصدور
            $table->date('received_date')->nullable();//تاريخ الاستلام
            $table->string('transportation_reasons')->nullable();//أسباب النقل
            $table->string('home_change')->nullable();//صورة ثبوتية لتغيير مكان السكن
            $table->string('work_change')->nullable();//صورة ثبوتية لتغيير مكان العمل
            $table->boolean('registered_branch_decision')->nullable();//قرار الفرع المسجل به
            $table->string('registered_branch_disapproval_reasons')->nullable();//اسباب عدم موافقة الفرع المسجل به
            $table->boolean('transferred_branch_decision')->nullable();//قرار الفرع المنتقل اليه
            $table->string('transferred_branch_disapproval_reasons')->nullable();//أسباب عدم موافقة الفرع المنتقل اليه
            $table->biginteger('newmembership_id')->nullable();//رقم العضوية الجديد
            $table->string('replace_reasons')->nullable();//اسباب استبدال
            $table->string('fullname_arabic')->nullable();//الاسم الثلاثي عربي
            $table->string('fullname_english')->nullable();//الاسم الثلاثي انكليزي
            $table->string('personal_image')->nullable();//الصورة الشخصية
            $table->string('status')->nullable();//حالة الطلب
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
