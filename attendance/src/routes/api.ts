import { Router } from 'express';
import attendanceRouter from './AttendanceRouter';
import TrustKey from '../middlewares/TrustKey';
import RequestLog from '../middlewares/RequestLog';

const router = Router();

router.get('/status', (_, res) => {
    res.send({ message: 'API of Attendeces is working' });
});

router.use('/', [RequestLog, TrustKey], attendanceRouter);

export default router;
