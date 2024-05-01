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
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            $table->string('uid', 20)->unique();
            $table->dateTime("dateHeureDebut");
            $table->dateTime("dateHeureFin");
            $table->unsignedBigInteger("raison_visite_id");
            $table->foreign("raison_visite_id")->references("id")->on("raison_visites")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("type_visite_id");
            $table->foreign("type_visite_id")->references("id")->on("type_visites")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("statut_id");
            $table->foreign("statut_id")->references("id")->on("statuts")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("personnel_id");
            $table->foreign("personnel_id")->references("id")->on("personnels")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("visiteur_id");
<<<<<<< HEAD
            $table->foreign("visiteur_id")->references("id")->on("visiteurs")->onDelete("cascade")->onUpdate("cascade");
            $table->text('details')->nullable();
=======
            $table->foreign("visiteur_id")
                ->references("id")
                ->on("visiteurs")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->text('details')->nullable(); // Exemple avec un champ string
>>>>>>> 47fe9bf0151297a4274c37a713e6731983a7b18d
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
