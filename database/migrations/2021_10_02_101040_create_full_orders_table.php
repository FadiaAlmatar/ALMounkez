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
            $table->string('type');//نوع الطلب
            $table->foreignId('branch_id');//رقم الفرع
            $table->string('side');//الجهة التي سيقدم عليها
            $table->foreignId('user_id');//رقم مقدم الطلب
            $table->integer('membership_id');//رقم عضوية مقدم الطلب
            $table->boolean('not_debtor');//بريئ الذمة
            $table->float('money_debt');//مبلغ الذمة
            $table->float('money_order');//مبلغ الطلب
            $table->boolean('capture');//تم القبض
            $table->boolean('receipt');//تم الاستلام
            $table->date('Published_at');//تاريخ الصدور
            $table->date('received_date');//تاريخ الاستلام
            $table->string('transportation_reasons');//أسباب النقل
            $table->string('home_change');//صورة ثبوتية لتغيير مكان السكن
            $table->string('work_change');//صورة ثبوتية لتغيير مكان العمل
            $table->boolean('registered_branch_decision');//قرار الفرع المسجل به
            $table->string('registered_branch_disapproval_reasons');//اسباب عدم موافقة الفرع المسجل به
            $table->boolean('transferred_branch_decision');//قرار الفرع المنتقل اليه
            $table->string('transferred_branch_disapproval_reasons');//أسباب عدم موافقة الفرع المنتقل اليه
            $table->biginteger('newmembership_id');//رقم العضوية الجديد
            $table->string('replace_reasons');//اسباب استبدال
            $table->string('fullname_arabic');//الاسم الثلاثي عربي
            $table->string('fullname_english');//الاسم الثلاثي انكليزي
            $table->string('personal_image');//الصورة الشخصية
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
