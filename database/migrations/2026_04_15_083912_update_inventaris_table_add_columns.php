<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('inventaris', function (Blueprint $table) {
            // Rename existing columns if they exist
            if (Schema::hasColumn('inventaris', 'nama_barang')) {
                $table->renameColumn('nama_barang', 'nama');
            }
            if (Schema::hasColumn('inventaris', 'tanggal')) {
                $table->renameColumn('tanggal', 'tanggal_masuk');

            }
            if (!Schema::hasColumn('inventaris', 'harga')) {
                $table->decimal('harga', 12, 2)->nullable()->after('tanggal_masuk');
            }

            // Drop user_id if it exists (we don't need it for this app)
            if (Schema::hasColumn('inventaris', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventaris', function (Blueprint $table) {
            //
        });
    }
};
