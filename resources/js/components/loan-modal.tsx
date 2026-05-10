import { router, usePage } from '@inertiajs/react';
import { Modal, Box, Typography, TextField, Button } from '@mui/material';
import { useEffect, useState } from 'react';


import { toast } from 'sonner';


type LoanModalProps = {
    open: boolean;
    handleClose: () => void;
    bookId: number | null;
};

type User = {
    id: number;
};

type PageProps = {
    auth: {
        user: User;
    };
};

export function LoanModal({ open, handleClose, bookId }: LoanModalProps) {
    const { auth } = usePage<PageProps>().props;

    const [formData, setFormData] = useState({
        user_id: auth.user.id,
        book_id: bookId,
        loan_date: '',
        return_date: '',
    });

    useEffect(() => {
        if (open) {
            setFormData({
                user_id: auth.user.id,
                book_id: bookId,
                loan_date: '',
                return_date: '',
            });
        }
    }, [open, bookId]);

    const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value,
        });
    };

    const handleSubmit = () => {
        router.post('/loans', formData, {
            onSuccess: () => {
                toast.success('Empréstimo realizado com sucesso!');

                handleClose();

                router.reload();
            },

            onError: () => {
                toast.error('Erro ao realizar empréstimo.');
            },
        });
    };

    return (
        <Modal open={open} onClose={handleClose}>
            <Box
                sx={{
                    position: 'absolute',
                    top: '50%',
                    left: '50%',
                    transform: 'translate(-50%, -50%)',
                    width: 500,
                    bgcolor: 'background.paper',
                    borderRadius: 4,
                    boxShadow: 24,
                    p: 4,
                    display: 'flex',
                    flexDirection: 'column',
                    gap: 2,
                }}
            >
                <Typography variant="h6" className="text-black">
                    Solicitar Empréstimo
                </Typography>

                <TextField
                    label="Data de empréstimo"
                    name="loan_date"
                    type="date"
                    fullWidth
                    required
                    value={formData.loan_date}
                    onChange={handleChange}
                    slotProps={{
                        inputLabel: {
                            shrink: true,
                        },
                    }}
                />

                <TextField
                    label="Data de devolução"
                    name="return_date"
                    type="date"
                    fullWidth
                    required
                    value={formData.return_date}
                    onChange={handleChange}
                    slotProps={{
                        inputLabel: {
                            shrink: true,
                        },
                    }}
                />

                <Button variant="contained" onClick={handleSubmit}>
                    Salvar
                </Button>
            </Box>
        </Modal>
    );
}
