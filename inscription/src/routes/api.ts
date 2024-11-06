import { Router } from 'express';
import inscriptionRouter from './InscriptionRouter';

const router = Router();

router.get('/status', (_, res) => {
    res.send({ message: 'API of Inscription is working' });
});

router.use('/', inscriptionRouter);

export default router;
