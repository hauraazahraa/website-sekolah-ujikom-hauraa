    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('profil_sekolahs', function (Blueprint $table) {
                $table->id();
                $table->string('alamat')->nullable();
                $table->string('telepon')->nullable();
                $table->string('email')->nullable();
                $table->text('visi')->nullable();
                $table->text('misi')->nullable();
                $table->string('akreditasi')->nullable();
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('profil_sekolahs');
        }
    };
