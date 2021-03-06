<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('invoice_number');
            $table->string('reference_number')->nullable();
            $table->string('status');
            $table->string('paid_status');
            $table->string('tax_per_item');
            $table->string('discount_per_item');
            $table->text('notes')->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('discount_val', 15, 2)->nullable();
            $table->decimal('sub_total', 15, 2);
            $table->decimal('total', 15, 2);
            $table->decimal('tax', 15, 2);
            $table->decimal('due_amount', 15, 2);
            $table->boolean('sent')->default(false);
            $table->boolean('viewed')->default(false);
            $table->string('unique_hash')->nullable();
            $table->integer('invoice_template_id')->unsigned()->nullable();
            $table->foreign('invoice_template_id')->references('id')->on('invoice_templates');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
