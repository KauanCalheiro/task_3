import { Router } from 'express';
import eventRouter from './EventRouter';
import TrustKey from '../middlewares/TrustKey';
import RequestLog from '../middlewares/RequestLog';

const router = Router();

router.get('/status', (_, res) => {
    res.send({ message: 'API of Event is working' });
});

router.use('/', [RequestLog, TrustKey], eventRouter);

export default router;
