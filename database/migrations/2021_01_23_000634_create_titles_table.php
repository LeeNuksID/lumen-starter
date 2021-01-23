<?php
    
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleTable extends Migration{
    
    public function up(){
        Schema::create('title', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('prov');
            $table->string('city');
            $table->string('images');
            $table->string('phone');
            $table->string('email');
            $table->string('maps');
            $table->string('facebook');
            $table->string('fee');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('title');
    }

    /**
     * Create by LeeNuksID :D
     * Thanks For Using Laragen
     */
}