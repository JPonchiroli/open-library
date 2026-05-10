<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory()
            ->count(10)
            ->state(new Sequence(

                [
                    'title' => 'Código Limpo',
                    'author' => 'Robert C. Martin',
                    'isbn' => '9780132350884',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/41SH-SvWPxL.jpg',
                ],

                [
                    'title' => 'Padrões de Projeto',
                    'author' => 'Erich Gamma',
                    'isbn' => '9780201633610',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/81gtKoapHFL.jpg',
                ],

                [
                    'title' => 'Refatoração',
                    'author' => 'Martin Fowler',
                    'isbn' => '9780134757599',
                    'book_cover_url' => 'https://http2.mlstatic.com/D_NQ_NP_2X_685691-MLA99948972877_112025-F.webp',
                ],

                [
                    'title' => 'Programador Pragmático',
                    'author' => 'Andrew Hunt',
                    'isbn' => '9780135957059',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/518FqJvR9aL.jpg',
                ],

                [
                    'title' => 'Spring em Ação',
                    'author' => 'Craig Walls',
                    'isbn' => '9781617294945',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/51viA0Y2Z+L.jpg',
                ],

                [
                    'title' => 'Java Concorrente na Prática',
                    'author' => 'Brian Goetz',
                    'isbn' => '9780321349606',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/71l4lTdeUWL.jpg',
                ],

                [
                    'title' => 'Java Efetivo',
                    'author' => 'Joshua Bloch',
                    'isbn' => '9780134685991',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/81-1QknPLOL.jpg',
                ],

                [
                    'title' => 'Design Orientado a Domínio',
                    'author' => 'Eric Evans',
                    'isbn' => '9780321125217',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/51OWGtzQLLL.jpg',
                ],

                [
                    'title' => 'Padrões de Microsserviços',
                    'author' => 'Chris Richardson',
                    'isbn' => '9781617294549',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/91oytqHnIKL.jpg',
                ],

                [
                    'title' => 'Entendendo Entrevistas de Programação',
                    'author' => 'Gayle Laakmann McDowell',
                    'isbn' => '9780984782857',
                    'book_cover_url' => 'https://m.media-amazon.com/images/I/61vFG3RSl8L.jpg',
                ],

            ))
            ->create();
    }
}
