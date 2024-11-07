import { Router } from 'express';
import inscriptionRouter from './InscriptionRouter';
import TrustKey from '../middlewares/TrustKey';

const router = Router();

router.get('/status', (_, res) => {
    res.send({ message: 'API of Inscription is working' });
});

router.use('/', TrustKey, inscriptionRouter);

export default router;
