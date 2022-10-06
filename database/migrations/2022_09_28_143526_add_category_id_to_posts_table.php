<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // definiamo la colonna
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            // definiamo la foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            // versione compatta da usare solo se si rispettano le convenzioni:
            // $table->foreignId('category_id')->after('id')->nullable()->onDelete('set null');


            // onDelete(set null) = serve per far si che se viene cancellata la categoria, il post comunque rimanga, senza il rischio che anche quest'ultimo venga perso.

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

            // elimina la relazione (FK)
            $table->dropForeign('posts_category_id_foreign');
            // (nometabella,nomecolonna,Keyname)
            // elimina la colonna
            $table->dropColumn('category_id');
        });
    }
}
