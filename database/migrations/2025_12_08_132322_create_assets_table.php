<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_code')->unique(); 
            $table->string('name');
            $table->enum('status', ['Available', 'In Use', 'Maintenance', 'Retired'])->default('Available');
            $table->decimal('acquisition_value', 15, 2)->nullable(); 
            $table->date('purchase_date')->nullable();
            
            $table->foreignId('last_modified_by')->nullable()->constrained('users'); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
