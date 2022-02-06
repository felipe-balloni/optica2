<?php

declare(strict_types=1);

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Type::class)->constrained();
            $table->string('federal_id')->nullable();
            $table->string('state_id')->nullable();
            $table->date('date_birth')->nullable();
            $table->unsignedInteger('sex')->nullable();
            $table->string('email')->nullable();
            $table->boolean('defaulter')->nullable();
            $table->text('comments')->nullable();
            $table->foreignIdFor(User::class)->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
}
