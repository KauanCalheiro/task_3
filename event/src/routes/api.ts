import { Router } from 'express';
import eventRouter from './EventRouter';
import TrustKey from '../middlewares/TrustKey';

const router = Router();

router.get('/status', (_, res) => {
    res.send({ message: 'API of Event is working' });
});

router.use('/', TrustKey, eventRouter);

export default router;
