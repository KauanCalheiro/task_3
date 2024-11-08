import { Router } from 'express';
import attendanceRouter from './AttendanceRouter';
import TrustKey from '../middlewares/TrustKey';

const router = Router();

router.get('/status', (_, res) => {
    res.send({ message: 'API of Event is working' });
});

router.use('/', TrustKey, attendanceRouter);

export default router;
