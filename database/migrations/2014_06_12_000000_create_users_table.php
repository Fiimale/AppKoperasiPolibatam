<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->string('no_anggota')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('tanggal_bergabung')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('masa_berlaku_ktp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_telp_rumah')->nullable();
            $table->string('status_tempat_tinggal')->nullable();
            $table->string('tinggal_sejak')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('jumlah_anak')->nullable();
            $table->string('npwp_pribadi')->nullable();
            $table->string('nama_ahli_waris')->nullable();
            $table->string('hubungan_ahli_waris')->nullable();
            $table->string('no_telp_kantor')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('tgl_mulai_bekerja')->nullable();
            $table->string('status_karyawan')->nullable();
            $table->string('foto')->nullable();
            $table->string('tanda_tangan')->nullable();
            // $table->foreign('role_id')->references('id')->on('roles');
            $table->foreignId('role_id')->constrained();
            $table->boolean('status_anggota')->default(1);
            $table->boolean('status_user')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
