import { Head, usePage } from '@inertiajs/react';
import { dashboard } from '@/routes';
import { useState } from 'react';
import { LoanModal } from '@/components/loan-modal';

type Book = {
    id: number;
    title: string;
    author: string;
    available_copies: number;
    book_cover_url: string;
};

type Loan = {
    title: string;
    author: string;
    loan_date: string;
    return_date: string;
};

type DashboardProps = {
    books: Book[];
    booksCount: number;
    loans: Loan[];
    loansCount: number;
};

export default function Dashboard({
    books,
    booksCount,
    loans,
    loansCount,
}: DashboardProps) {
    const { auth } = usePage().props;

    const [openLoanModal, setOpenLoanModal] = useState(false);

    const [selectedBookId, setSelectedBookId] = useState<number | null>(null);

    const handleOpenLoanModal = (bookId: number) => {
        setSelectedBookId(bookId);

        setOpenLoanModal(true);
    };

    return (
        <>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    <div className="relative overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                        <h1 className="text-xl font-bold">
                            Livros Disponíveis
                        </h1>
                        <p>{booksCount}</p>
                    </div>
                    <div className="relative overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                        <h1 className="text-xl font-bold">
                            Empréstimos Ativos
                        </h1>
                        <p>{loansCount}</p>
                    </div>
                    <div className="relative overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                        <h1 className="text-xl font-bold">Usuário</h1>
                        <p>{auth.user.name}</p>
                    </div>
                </div>

                <h1 className="text-2xl font-bold">Acervo de livros</h1>
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    {books.slice(0, 3).map((book) => (
                        <div className="relative flex gap-4 overflow-hidden rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                            <div className="shrink-0">
                                <img
                                    className="h-44 w-32 rounded-lg object-cover"
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
                                            ? 'Disponível'
                                            : 'Sem estoque'}
                                    </p>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>

                <div className="flex flex-col gap-6">
                    <div className="overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <div className="border-b border-sidebar-border/70 p-4">
                            <h1 className="text-2xl font-bold">
                                Meus Empréstimos
                            </h1>
                        </div>

                        <div className="overflow-x-auto">
                            <table className="w-full border-collapse">
                                <thead>
                                    <tr className="border-b border-sidebar-border/70">
                                        <th className="p-4 text-left">Livro</th>
                                        <th className="p-4 text-left">Autor</th>
                                        <th className="p-4 text-left">
                                            Data Empréstimo
                                        </th>
                                        <th className="p-4 text-left">
                                            Data Devolução
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {loans.map((loan, index) => (
                                        <tr
                                            key={index}
                                            className="border-b border-sidebar-border/50 transition hover:bg-muted/40"
                                        >
                                            <td className="p-4">
                                                {loan.title}
                                            </td>

                                            <td className="p-4">
                                                {loan.author}
                                            </td>

                                            <td className="p-4">
                                                {loan.loan_date}
                                            </td>

                                            <td className="p-4">
                                                {loan.return_date}
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div className="overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <div className="border-b border-sidebar-border/70 p-4">
                            <h1 className="text-2xl font-bold">
                                Todos os Livros
                            </h1>
                        </div>

                        <div className="overflow-x-auto">
                            <table className="w-full border-collapse">
                                <thead>
                                    <tr className="border-b border-sidebar-border/70">
                                        <th className="p-4 text-left">
                                            Título
                                        </th>
                                        <th className="p-4 text-left">Autor</th>
                                        <th className="p-4 text-left">
                                            Disponibilidade
                                        </th>
                                        <th className="p-4 text-left">
                                            Empréstimo
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {books.map((book, index) => (
                                        <tr
                                            key={index}
                                            className="border-b border-sidebar-border/50 transition hover:bg-muted/40"
                                        >
                                            <td className="p-4">
                                                {book.title}
                                            </td>

                                            <td className="p-4">
                                                {book.author}
                                            </td>

                                            <td className="p-4">
                                                {book.available_copies >= 1
                                                    ? 'Disponível'
                                                    : 'Sem estoque'}
                                            </td>

                                            <td className="p-4">
                                                <button
                                                    disabled={
                                                        book.available_copies <
                                                        1
                                                    }
                                                    onClick={() =>
                                                        handleOpenLoanModal(
                                                            book.id,
                                                        )
                                                    }
                                                    className={`rounded-2xl border border-solid p-3 transition ${
                                                        book.available_copies >=
                                                        1
                                                            ? 'border-black bg-black text-white hover:cursor-pointer hover:bg-white hover:text-black dark:border-white dark:bg-white dark:text-black dark:hover:bg-black dark:hover:text-white'
                                                            : 'cursor-not-allowed border-gray-500 text-gray-500 opacity-50'
                                                    } `}
                                                >
                                                    {book.available_copies >= 1
                                                        ? 'Solicitar'
                                                        : 'Sem Estoque'}
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <LoanModal
                open={openLoanModal}
                handleClose={() => setOpenLoanModal(false)}
                bookId={selectedBookId}
            />
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
