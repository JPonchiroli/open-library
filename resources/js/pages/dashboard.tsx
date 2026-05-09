import { Head, usePage } from '@inertiajs/react';
import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import { dashboard } from '@/routes';

type Book = {
    title: string,
    author: string,
    available_copies: number,
    book_cover_url: string,
}

type DashboardProps = {
    books: Book[],
    booksCount: number
}

export default function Dashboard({ books, booksCount }: DashboardProps) {

    const { auth } = usePage().props;

    return ( 
        <>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    <div className="relative p-4 overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <h1 className='text-xl font-bold'>Livros Disponíveis</h1>
                        <p>{booksCount}</p>
                    </div>
                    <div className="relative p-4 overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <h1 className='text-xl font-bold'>Empréstimos Ativos</h1>
                        <p>123 exemplares</p>
                    </div>
                    <div className="relative p-4 overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <h1 className='text-xl font-bold'>Usuário</h1>
                        <p>{auth.user.name}</p>
                    </div>
                </div>

                <h1 className='text-2xl font-bold'>Acervo de livros</h1>
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">

                    {books.slice(0,3).map(book => (

                        <div className="relative flex gap-4 p-4 overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">

                            <div className="shrink-0">
                                <img
                                    className="w-32 h-44 object-cover rounded-lg"
                                    src={book.book_cover_url}
                                    alt="capaLivro"
                                />
                            </div>

                            <div className="flex flex-1 flex-col justify-between">

                                <div className="space-y-2">
                                    <h2 className="text-xl font-bold">
                                        {book.title}
                                    </h2>

                                    <p className="text-sm opacity-80">
                                        {book.author}
                                    </p>

                                    <p>
                                        {book.available_copies >= 1
                                            ? "Disponível"
                                            : "Sem estoque"}
                                    </p>
                                </div>

                                <div className="flex justify-end">

                                    <button
                                        disabled={book.available_copies < 1}
                                        className={`
                                            p-3 rounded-2xl border border-solid
                                            transition

                                            ${
                                                book.available_copies >= 1
                                                    ? 'bg-black text-white border-black hover:cursor-pointer hover:bg-white hover:text-black dark:bg-white dark:text-black dark:border-white dark:hover:bg-black dark:hover:text-white'
                                                    : 'border-gray-500 text-gray-500 cursor-not-allowed opacity-50'
                                            }
                                        `}
                                    >
                                        {book.available_copies >= 1
                                            ? 'Solicitar Empréstimo'
                                            : 'Sem Estoque'}
                                    </button>

                                </div>

                            </div>

                        </div>

                    ))}
                    
                </div>

                <div className="relative flex-1 overflow-hidden rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                        <h1>teste</h1>
                </div>
            </div>
        </>
    );
}

Dashboard.layout = {
    breadcrumbs: [
        {
            title: 'Biblioteca de Livros',
            href: dashboard(),
        },
    ],
};
