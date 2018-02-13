<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCommentsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	
		Schema::table('comments', function($t) {
                        $t->renameColumn('userid', 'author');
                        $t->renameColumn('comment', 'description');
                });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('stnk', function($t) {
                         $t->renameColumn('author', 'userid');
                        $t->renameColumn('description', 'comment');
                });
	
        
    }
}
