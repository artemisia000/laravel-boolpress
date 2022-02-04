<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //colonna per FK
            $table->unsignedBigInteger('category_id');
            
            //definizione FK
            $table->foreign('category_id')->nullable()->after('id')
                   ->references('id')
                   ->on('categories')
                   ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            //per eliminare la FK in una determinata colonna

            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');
        
        });
    }
}
