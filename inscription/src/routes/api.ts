import { Router } from 'express';
import eventRouter from './InscriptionRouter';

const router = Router();

router.get('/status', (_, res) => {
    res.send({ message: 'API of Event is working' });
});

router.use('/', eventRouter);

export default router;
