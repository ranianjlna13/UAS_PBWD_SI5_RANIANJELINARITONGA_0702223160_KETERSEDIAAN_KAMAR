<?php

// database/migrations/create_levels_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
  public function up()
  {
    Schema::create('levels', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('levels');
  }
}

