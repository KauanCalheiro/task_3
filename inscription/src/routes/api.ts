import { Router } from 'express';
import inscriptionRouter from './InscriptionRouter';
import TrustKey from '../middlewares/TrustKey';
import RequestLog from '../middlewares/RequestLog';

const router = Router();

router.get('/status', (_, res) => {
    res.send({ message: 'API of Inscription is working' });
});

router.use('/', [RequestLog, TrustKey], inscriptionRouter);

export default router;
