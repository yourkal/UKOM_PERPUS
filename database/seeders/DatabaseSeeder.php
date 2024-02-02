<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('categories')->insert([
            'name' => 'fiksi',
        ]);
        DB::table('categories')->insert([
            'name' => 'non-fiksi',
        ]);

        DB::table('books')->insert([
            'title' => 'Judul Buku Fiksi',
            'code' => 'AF123',
            'author' => 'jono',
            'publisher' => 'gramed',
            'description' => 'ini desckripsi penting dari buku dengan judul (judul buku)...',
            'category_id' => 1,
            'stock' => 5,
            'created_at' => '2023-12-12 01:24:14'
        ]);
        DB::table('books')->insert([
            'title' => 'Judul Buku Non Fiksi',
            'code' => 'AF456',
            'author' => 'jono',
            'publisher' => 'gramed',
            'description' => 'ini desckripsi penting dari buku dengan judul (judul buku)...',
            'category_id' => 2,
            'stock' => 5,
            'created_at' => '2023-12-13 01:24:14'
        ]);
        DB::table('books')->insert([
            'title' => 'Judul Buku Fiksi',
            'code' => 'AF789',
            'author' => 'jono',
            'publisher' => 'gramed',
            'description' => 'ini desckripsi penting dari buku dengan judul (judul buku)...',
            'category_id' => 1,
            'stock' => 5,
            'created_at' => '2023-12-13 01:24:14'
        ]);
        DB::table('books')->insert([
            'title' => 'Judul Buku Non Fiksi',
            'code' => 'AF012',
            'author' => 'jono',
            'publisher' => 'gramed',
            'description' => 'ini desckripsi penting dari buku dengan judul (judul buku)...',
            'category_id' => 2,
            'stock' => 5,
            'created_at' => '2023-12-14 01:24:14'
        ]);
        DB::table('books')->insert([
            'title' => 'Judul Buku Fiksi',
            'code' => 'AF785239',
            'author' => 'jono',
            'publisher' => 'gramed',
            'description' => 'ini desckripsi penting dari buku dengan judul (judul buku)...',
            'category_id' => 1,
            'stock' => 5,
            'created_at' => '2023-12-14 01:24:14'
        ]);
        DB::table('books')->insert([
            'title' => 'Judul Buku Non Fiksi',
            'code' => 'AF05212',
            'author' => 'jono',
            'publisher' => 'gramed',
            'description' => 'ini desckripsi penting dari buku dengan judul (judul buku)...',
            'category_id' => 2,
            'stock' => 5,
            'created_at' => '2023-12-14 01:24:14'
        ]);
        DB::table('books')->insert([
            'title' => 'Judul Buku Fiksi',
            'code' => 'AF78239',
            'author' => 'jono',
            'publisher' => 'gramed',
            'description' => 'ini desckripsi penting dari buku dengan judul (judul buku)...',
            'category_id' => 1,
            'stock' => 5,
            'created_at' => '2023-12-14 01:24:14'
        ]);
        DB::table('books')->insert([
            'title' => 'Judul Buku Non Fiksi',
            'code' => 'AF01522',
            'author' => 'jono',
            'publisher' => 'gramed',
            'description' => 'ini desckripsi penting dari buku dengan judul (judul buku)...',
            'category_id' => 2,
            'stock' => 5,
            'created_at' => '2023-12-15 01:24:14'
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'nis_nip' => '123456789098765',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'name' => 'fattah rizqi',
            'username' => 'fattah',
            'nis_nip' => '123456789058765',
            'email' => 'fattah@gmail.com',
            'role' => 'user',
            'password' => bcrypt('12345'),
        ]);

        DB::table('users')->insert([
            'name' => 'librarian',
            'username' => 'librarian',
            'nis_nip' => '123456789092765',
            'email' => 'librarian@gmail.com',
            'role' => 'librarian',
            'password' => bcrypt('librarian'),
        ]);
    }
}
