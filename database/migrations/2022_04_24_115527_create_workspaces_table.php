<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->json('gallery');
            $table->string('price');
            $table->string('address');
            $table->enum('status', ['Booked', 'Available'])->default('Booked');
            $table->enum('type', ['Private Office', 'Public Office', 'Workspace', 'Skype Room'])->default('Workspace');
            $table->json('features')->nullable();

            // Foreign Key For Owner
            $table->foreignId('owner_id')->constrained('owners')->nullOnDelete();

            // Foreign Key For City
            $table->foreignId('city_id')->constrained('cities')->nullOnDelete();

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
        Schema::dropIfExists('workspaces');
    }
}
