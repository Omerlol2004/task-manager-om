<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
public function up(): void {
Schema::dropIfExists('tasks');
Schema::create('tasks', function (Blueprint $table) {
$table->id();
$table->foreignId('user_id')->constrained()->cascadeOnDelete();
$table->string('name');
$table->text('description')->nullable();
$table->boolean('completed')->default(false);
$table->date('due_date')->nullable();
$table->timestamps();
});
}
public function down(): void {
Schema::dropIfExists('tasks');
}
};