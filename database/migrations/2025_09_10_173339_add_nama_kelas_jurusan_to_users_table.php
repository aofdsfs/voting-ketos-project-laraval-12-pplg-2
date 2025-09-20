<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
    if (!Schema::hasColumn('users', 'nama')) {
        $table->string('nama')->after('id')->nullable();
    }
    if (!Schema::hasColumn('users', 'kelas')) {
        $table->string('kelas')->after('nama')->nullable();
    }
    if (!Schema::hasColumn('users', 'jurusan')) {
        $table->string('jurusan')->after('kelas')->nullable();
    }
});

    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nama', 'kelas', 'jurusan']);
        });
    }
};
